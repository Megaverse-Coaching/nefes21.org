<?php

namespace App\DataTables;

use App;
use App\Models\Admin\Soundscape;
use Carbon\Carbon;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

/**
 * @property mixed|null $id
 */
class SoundscapeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     * @throws Exception
     */
    public function dataTable(mixed $query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->rawColumns(['action', 'isFree', 'isValid'])
            ->blacklist(['action'])


            ->editColumn('order', function (Soundscape $model) {
                return $model->order;
            })
            ->editColumn('id', function (Soundscape $model) {
                return $model->id;
            })
            ->editColumn('title', function (Soundscape $model) {
                return $model->title;
            })
            ->editColumn('duration', function (Soundscape $model) {
                return !isset($model->duration) ? ' - ' : $model->duration;
            })
            ->editColumn('isFree', function (Soundscape $model) {
                $styles = [0 => 'warning', 1 => 'info'];
                $style = $styles[$model->isFree] ?? 'info';
                $value = ($model->isFree === 1) ? "Premium" : "Free";
                return '<div class="badge badge-light-' . $style . ' fw-bolder">' . $value . '</div>';
            })
            ->editColumn('isValid', function (Soundscape $model) {
                $styles = [0 => 'danger', 1 => 'success'];
                $style = $styles[$model->isValid] ?? 'info';
                $value = ($model->isValid === 1) ? "Valid" : "Invalid";
                return '<div class="badge badge-light-' . $style . ' fw-bolder">' . $value . '</div>';
            })
            ->editColumn('updated_at', function (Soundscape $model) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($model->updated_at)->translatedFormat('j F, Y H:i:s');
            })
            ->editColumn('created_at', function (Soundscape $model) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($model->created_at)->translatedFormat('j F, Y H:i:s');
            })
            ->addColumn('action', content: function (Soundscape $model) {
                return view(view: 'admin.soundscape._action-menu', data: compact('model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Soundscape $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Soundscape $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model::where('status', 1)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('soundscape-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->responsive()
            ->autoWidth()
            ->parameters([
                'scrollX' => true,
                'drawCallback' => 'function() { KTMenu.createInstances(); }',
                'language' => ['url' => url('/vendor/datatables/lang/' . config('app.locale') . '.json')],
            ])
            ->buttons(Button::raw('<i class="las la-plus-circle fs-2x"></i> New')->addClass('btn btn-outline btn-outline-dashed btn-outline-info btn-active-light-info')->action("window.location = '".route('admin.soundscape.create', ['id' => $this->id])."';"))
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
            Column::make('order')->title('#')->addClass('ps-0'),
            Column::make('id')->title('ID')->addClass('ps-5'),
            Column::make('title')->title('Track Title'),
            Column::make('duration')->title('Duration'),
            Column::make('isFree')->title('Free/Premium'),
            Column::make('isValid')->title('Valid'),
            Column::make('updated_at')->title('Güncellendi')->addClass('none'),
            Column::make('created_at')->title('Eklendi')->addClass('none'),
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
        return 'Soundscapes_'.date('YmdHis');
    }
}
