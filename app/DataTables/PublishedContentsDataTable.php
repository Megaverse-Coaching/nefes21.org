<?php

namespace App\DataTables;

use App;
use App\Models\Admin\Content;
use App\Models\Scopes\PublishedContents;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PublishedContentsDataTable extends DataTable
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
            ->editColumn('type', content: function (Content $content){
                $styles = ['Course' => 'warning','Single' => 'dark','Podcast'  => 'primary','Story' => 'danger','Meditation' => 'info','Breath' => 'success','ASMR' => 'success','Music' => 'primary'];
                $types = $content->type;//json_decode($content->type, JSON_THROW_ON_ERROR | false, 512, JSON_THROW_ON_ERROR);
                $value = "";
                foreach ($types as $type){
                    $style = $styles[$type] ?? "info";
                    $value .=  '<div class="badge badge-light-'.$style.' fw-bolder">'.$type.'</div>';
                }
                return $value;
            })
            ->editColumn('admin_id', function (Content $content) {
                return !isset($content->adminadmin) ? ' - ' :  $content->admin->name;
            })
            ->editColumn('isFree', content: function (Content $content){
                $styles = [0 => 'warning', 1 => 'info'];
                $style = $styles[$content->isFree] ?? 'info';
                $value = ($content->isFree === 1)  ? "Premium" : "Free";
                return '<div class="badge badge-light-'.$style.' fw-bolder">'.$value.'</div>';
            })
            ->editColumn('isValid', content: function (Content $content){
                $styles = [0 => 'danger', 1 => 'success'];
                $style = $styles[$content->isValid] ?? 'info';
                $value = ($content->isValid === 1)  ? "Valid" : "Invalid";
                return '<div class="badge badge-light-'.$style.' fw-bolder">'.$value.'</div>';
            })
            ->editColumn('imgCover', content: function (Content $content) {
                return "<img src=\"" . asset($content->imgCover ?? 'storage/placeholder.jpg') . "\" class=\"h-100 w-100px\" />";
            })
            ->editColumn('imgShowcase', content: function (Content $content) {
                return "<img src=\"" . asset($content->imgShowcase  ?? 'storage/placeholder.jpg'). "\" class=\"h-100 w-100px\" />";
            })
            ->editColumn('updated_at', function (Content $content) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($content->updated_at)->translatedFormat('j F, Y H:i:s');
            })
            ->editColumn('created_at', function (Content $content) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($content->created_at)->translatedFormat('j F, Y H:i:s');
            })
            ->editColumn('created_by', function (Content $content) {
                return !isset($content->created_by) ? ' - ' :  $content->created_by->name;
            });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Content $published
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Content $published)
    {
        return $published::activeContents($this->status)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('published-contents-table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('admin.contents.published', ['status' => 1]))
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
            Column::make('updated_at')->title('Güncellendi')->addClass('none'),
            Column::make('created_at')->title('Eklendi')->addClass('none'),
            Column::make('created_by')->title('Ekleyen')->addClass('none'),
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
        return 'Published_'.date('YmdHis');
    }
}
