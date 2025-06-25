<?php

namespace App\DataTables;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(mixed $query): DataTableAbstract
    {
        return datatables()->eloquent($query)->rawColumns(['action'])->blacklist(['action'])

            ->addColumn('action', function (User $model) {
                return view('admin.users._action-menu', compact('model'));
            })
            ->editColumn('updated_at', function (User $model) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($model->created_at)->translatedFormat('j F, Y H:i:s');
            })
            ->editColumn('created_at', function (User $model) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($model->created_at)->translatedFormat('j F, Y H:i:s');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html(): Builder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'scrollX'      => true,
                        'drawCallback' => 'function() { KTMenu.createInstances(); }',
                        'language' => ['url' => url('/vendor/datatables/lang/' . config('app.locale') . '.json')],
                        'buttons' => ['reload'],
                    ])

    ;}

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('first_name'),
            Column::make('last_name'),
            Column::make('email'),
            Column::make('created_at'),
            Column::make('updated_at'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
