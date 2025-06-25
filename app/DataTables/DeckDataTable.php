<?php

namespace App\DataTables;

use App;
use App\Models\Admin\Deck;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DeckDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->rawColumns(['action', 'isValid', 'status', 'showcase'])
            ->blacklist(['action', 'showcase'])

            ->editColumn('order', function (Deck $model) {
                return $model->order;
            })
            ->editColumn('showcase', content: function (Deck $model) {
                return "<img src=\"" . asset($model->showcase ?? 'storage/placeholder-showcase.jpg') . "\" class=\"h-100px rounded-4\" />";
            })

            ->editColumn('id', function (Deck $model) {
                return $model->id;
            })
            ->editColumn('title', function (Deck $model) {
                return $model->title;
            })
            ->editColumn('tag', function (Deck $model) {
                return $model->tag;
            })
            ->editColumn('isValid', function (Deck $model) {
                $styles = [0 => 'danger', 1 => 'success'];
                $style = $styles[$model->isValid] ?? 'info';
                $value = ($model->isValid === 1) ? "Valid" : "Invalid";
                return '<div class="badge badge-light-' . $style . ' fw-bolder">' . $value . '</div>';
            })
            ->editColumn('created', function (Deck $model) {
                Carbon::setlocale(App::getLocale());
                $date = (isset($model->created_at)) ? Carbon::parse($model->created_at)->translatedFormat('j F, Y H:i:s') : " - ";
                $usr = $model->created_by_user->name ?? " - ";
                return $usr. ": ".$date;
            })
            ->editColumn('updated', function (Deck $model) {
                Carbon::setlocale(App::getLocale());
                $date = (isset($model->updated_at)) ? Carbon::parse($model->updated_at)->translatedFormat('j F, Y H:i:s') : " - ";
                $usr = $model->updated_user->name ?? " - ";
                return $usr. ": ".$date;
            })
            ->addColumn('action', content: function (Deck $model) {
                return view(view: 'admin.decks._action-menu', data: compact('model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Deck $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Deck $model)
    {
        return $model::where('status', 1)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('deck-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->responsive()
                    ->autoWidth(false)
                    ->parameters([
                        'scrollX' => true,
                        'drawCallback' => 'function() { KTMenu.createInstances(); }',
                        'language' => ['url' => url('/vendor/datatables/lang/' . config('app.locale') . '.json')],
                    ])
                    ->buttons(Button::raw('<i class="las la-plus-circle fs-2x"></i>New')->addClass('btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info')->action("window.location = '".route('admin.decks.create', ['id' => $this->id])."';"),)
                    ->addTableClass('align-middle table-row-dashed fs-6 gy-5');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('order')->title('#')->addClass('ps-0')->width(50),
            Column::make('showcase')->title('SHOWCASE')->addClass('ps-5')->width(300),
            Column::make('id')->title('DECK ID')->addClass('ps-5'),
            Column::make('title')->title('DECK TITLE'),
            Column::make('tag')->title('DAILY CARD TAG'),
            Column::make('isValid')->title('VALIDATION'),
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
        return 'Decks_'.date('YmdHis');
    }
}
