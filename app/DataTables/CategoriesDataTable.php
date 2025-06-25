<?php

namespace App\DataTables;

use App;
use App\Models\Admin\Category;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

use Yajra\DataTables\{
    EloquentDataTable,
    Html\Builder as HtmlBuilder,
    Html\Button,
    Html\Column,
    Services\DataTable
};

class CategoriesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->rawColumns(['action', 'status'])
            ->blacklist(['action', 'showcase'])
            ->editColumn('order', function (Category $model) {
                return $model->order;
            })
            ->editColumn('id', function (Category $model) {
                return $model->category;
            })
            ->editColumn('title', function (Category $model) {
                return $model->title;
            })
            ->editColumn('description', function (Category $model) {
                return $model->description;
            })
            ->editColumn('created', function (Category $model) {
                Carbon::setlocale(App::getLocale());
                $date = (isset($model->created_at)) ? Carbon::parse($model->created_at)->translatedFormat('j F, Y H:i:s') : " - ";
                $usr = $model->created_by_user->name ?? " - ";
                return $usr. ": ".$date;
            })
            ->editColumn('updated', function (Category $model) {
                Carbon::setlocale(App::getLocale());
                $date = (isset($model->updated_at)) ? Carbon::parse($model->updated_at)->translatedFormat('j F, Y H:i:s') : " - ";
                $usr = $model->updated_user->name ?? " - ";
                return $usr. ": ".$date;
            })
            ->addColumn('action', content: function (Category $model) {
                return view(view: 'admin.categories._action-menu', data: compact('model'));
            });

    }

    /**
     * Get query source of dataTable.
     *
     * @param Category $model
     * @return QueryBuilder
     */
    public function query(Category $model): QueryBuilder
    {
        return $model::where('dimension_id',$this->id)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('categories-table')
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
            Column::make('order')->title('#')->addClass('ps-0')->width(50),
            Column::make('id')->title('Category ID')->addClass('ps-5'),
            Column::make('title')->title('Category Label'),
            Column::make('description')->title('Category Description'),
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
        return 'Categories_' . date('YmdHis');
    }
}
