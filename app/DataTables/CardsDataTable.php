<?php

namespace App\DataTables;

use App;
use App\Models\Admin\Card;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CardsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param Builder $query Results from query() method.
     * @return EloquentDataTable
     */
    public function dataTable(Builder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['action', 'isValid', 'status'])
            ->blacklist(['action'])
            ->editColumn('id', function (Card $model) {
                return $model->deck->id . " - " .$model->id;
            })
            ->editColumn('title', function (Card $model) {
                return $model->title;
            })
            ->editColumn('description', function (Card $model) {
                return $model->description;
            })
            ->editColumn('related', function (Card $model) {
                return $model->content->title;
            })
            ->editColumn('status', function (Card $model) {
                $styles = [0 => 'danger', 1 => 'success'];
                $style = $styles[$model->status] ?? 'info';
                $value = ($model->status === 1) ? "Available" : "Unavailable";
                return '<div class="badge badge-light-' . $style . ' fw-bolder">' . $value . '</div>';
            })
            ->editColumn('created', function (Card $model) {
                Carbon::setlocale(App::getLocale());
                $date = (isset($model->created_at)) ? Carbon::parse($model->created_at)->translatedFormat('j F, Y H:i:s') : " - ";
                $usr = $model->created_by_user->name ?? " - ";
                return $usr. ": ".$date;
            })
            ->editColumn('updated', function (Card $model) {
                Carbon::setlocale(App::getLocale());
                $date = (isset($model->updated_at)) ? Carbon::parse($model->updated_at)->translatedFormat('j F, Y H:i:s') : " - ";
                $usr = $model->updated_user->name ?? " - ";
                return $usr. ": ".$date;
            })
            ->addColumn('action', content: function (Card $model) {
                return view(view: 'admin.decks.cards._action-menu', data: compact('model'));
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Card $model
     * @return Builder
     */
    public function query(Card $model): Builder
    {
        return $model::where('deck_id', $this->id)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('cards-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
                    ->responsive()
                    ->parameters([
                        'scrollX'      => true,
                        'drawCallback' => 'function() { KTMenu.createInstances(); }',
                        'language' => ['url' => url('/vendor/datatables/lang/' . config('app.locale') . '.json')],
                    ])
                    ->buttons(
                        Button::raw('<i class="las la-arrow-alt-circle-left fs-2x"></i> Back')->addClass('btn btn-outline btn-outline-dashed btn-outline-secondary btn-active-light-secondary')->action("window.location = '".route('admin.decks.edit', ['deck' => $this->id])."';"),
                        Button::raw('<i class="las la-plus-circle fs-2x"></i> New')->addClass('btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info')->action("$('#kt_modal_new_card').modal('show');"))
                    ->addTableClass('align-middle table-row-dashed fs-6 gy-5');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('id')->title('Card ID')->addClass('ps-0'),
            Column::make('title')->title('Card Title'),
            Column::make('description')->title('Card Description'),
            Column::make('related')->title('Related Content'),
            Column::make('status')->title('Daily Available'),
            Column::make('created')->title('Created By: ')->addClass('none'),
            Column::make('updated')->title('Updated By: ')->addClass('none'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('d-flex text-center')
                ->responsivePriority(-1),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Cards_' . date('YmdHis');
    }
}
