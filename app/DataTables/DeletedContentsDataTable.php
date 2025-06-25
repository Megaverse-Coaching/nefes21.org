<?php

namespace App\DataTables;

use App;
use App\Models\Admin\Content;
use App\Models\Scopes\PublishedContents;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DeletedContentsDataTable extends DataTable
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
            ->rawColumns(['action', 'type', 'isFree', 'isValid', 'imgShowcase', 'imgCover'])
            ->blacklist(['action', 'type', 'imgShowcase', 'imgCover'])

            ->addColumn('action', content: function (Content $content) {
                return view(view: 'admin.contents._action-menu', data: compact('content'));
            })
            ->editColumn('type', content: function (Content $model){
                $styles = ['Course' => 'warning','Single' => 'dark','Podcast'  => 'primary','Story' => 'danger','Meditation' => 'info','Breath' => 'success','ASMR' => 'success','Music' => 'primary'];
                $types = $model->type;//json_decode($model->type, JSON_THROW_ON_ERROR | false, 512, JSON_THROW_ON_ERROR);
                $value = "";
                foreach ($types as $type){
                    $style = $styles[$type] ?? "info";
                    $value .=  '<div class="badge badge-light-'.$style.' fw-bolder">'.$type.'</div>';
                }
                return $value;
            })
            ->editColumn('admin_id', function (Content $model) {
                return !isset($model->admin) ? ' - ' :  $model->admin->name;
            })
            ->editColumn('isFree', content: function (Content $model){
                $styles = [0 => 'warning', 1 => 'info'];
                $style = $styles[$model->isFree] ?? 'info';
                $value = ($model->isFree === 1)  ? "Premium" : "Free";
                return '<div class="badge badge-light-'.$style.' fw-bolder">'.$value.'</div>';
            })
            ->editColumn('isValid', content: function (Content $model){
                $styles = [0 => 'danger', 1 => 'success'];
                $style = $styles[$model->isValid] ?? 'info';
                $value = ($model->isValid === 1)  ? "Valid" : "Invalid";
                return '<div class="badge badge-light-'.$style.' fw-bolder">'.$value.'</div>';
            })
            ->editColumn('imgCover', content: function (Content $model) {
                return "<img src=\"" . asset($model->imgCover ?? 'storage/placeholder.jpg') . "\" class=\"h-100 w-100px\" />";
            })
            ->editColumn('imgShowcase', content: function (Content $model) {
                return "<img src=\"" . asset($model->imgShowcase  ?? 'storage/placeholder.jpg'). "\" class=\"h-100 w-100px\" />";
            })
            ->editColumn('updated_at', function (Content $model) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($model->updated_at)->translatedFormat('j F, Y H:i:s');
            })
            ->editColumn('created_at', function (Content $model) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($model->created_at)->translatedFormat('j F, Y H:i:s');
            })
            ->editColumn('created_by', function (Content $model) {
                return !isset($model->created_by) ? ' - ' :  $model->createdBy_user->name;
            })
            ->editColumn('deleted_at', function (Content $model) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($model->deleted_at)->translatedFormat('j F, Y H:i:s');
            })
            ->editColumn('deleted_by', content: function (Content $model) {
                return !isset($model->deleted_by) ? ' - ' :  $model->deletedBy_user->name;
            });

    }

    /**
     * Get query source of dataTable.
     *
     * @param Content $model
     * @return Builder
     */
    public function query(Content $model)
    {
        return $model::onlyTrashed()->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('trashed-contents-table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('admin.contents.trashed'))
            ->dom('Bfrtip')
            ->orderBy(0)
//            ->language( "//cdn.datatables.net/plug-ins/1.10.21/i18n/Turkish.json" )
            ->responsive()
            ->autoWidth(false)
            ->parameters([
                'scrollX'      => true,
                'drawCallback' => 'function() { KTMenu.createInstances(); }',
                'language' => ['url' => url('/vendor/datatables/lang/' . config('app.locale') . '.json')],
            ])
//            ->buttons(
//                Button::raw('New')->addClass('mt-10 btn btn-sm btn-light-info')->action("window.location = '".route('admin.contents.create')."';")
//            )
            ->buttons('none')
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
            Column::make('id')->title('ID')->addClass('ps-0')->width(100),
            Column::make('title')->title('Title')->width(300),
            Column::make('type')->title('Types')->width(300),
            Column::make('admin_id')->title('User')->width(200),
            Column::make('isFree')->title('IS FREE')->width(100),
            Column::make('isValid')->title('IS VALID')->width(100),
            Column::make('imgCover')->title('Cover')->width(200),
            Column::make('imgShowcase')->title('Showcase')->width(200),
            Column::make('updated_at')->title('Güncelleme Tarihi')->addClass('none'),
            Column::make('created_at')->title('Oluşturulma Tarihi')->addClass('none'),
            Column::make('deleted_at')->title('Silinme Tarihi')->addClass('none'),
            Column::make('created_by')->title('Ekleyen Kişi')->addClass('none'),
            Column::make('deleted_by')->title('Silen Kişi')->addClass('none'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('d-flex text-center justify-content-end')
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
        return 'Contents_'.date('YmdHis');
    }
}
