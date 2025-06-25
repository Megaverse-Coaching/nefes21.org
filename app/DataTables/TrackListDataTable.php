<?php

namespace App\DataTables;

use App;
use App\Models\Admin\Track;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;

class TrackListDataTable extends DataTable
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
            ->rawColumns(['action', 'isFree', 'isValid'])
            ->blacklist(['action'])


            ->editColumn('id', function (Track $model) {
                return $model->content->id . "-". $model->id;
            })
            ->editColumn('order', function (Track $model) {
                return !isset($model->order) ? ' - ' :  $model->order;
            })
            ->editColumn('link', function (Track $model) {
                return !isset($model->link) ? ' - ' :  $model->link;
            })
            ->editColumn('duration', function (Track $model) {
                return !isset($model->duration) ? ' - ' :  $model->duration;
            })
            ->editColumn('admin_id', function (Track $model) {
                return !isset($model->user) ? ' - ' :  $model->user->name;
            })
            ->editColumn('soundscape_id', function (Track $model) {
                return !isset($model->soundscape) ? ' - ' : $model->soundscape->title;
            })
            ->editColumn('volume', function (Track $model) {
                return !isset($model->volume) ? ' - ' :  "%".$model->volume;
            })
            ->editColumn('isFree', function (Track $model){
                $styles = [0 => 'warning', 1 => 'info'];
                $style = $styles[$model->isFree] ?? 'info';
                $value = ($model->isFree === 1)  ? "Premium" : "Free";
                return '<div class="badge badge-light-'.$style.' fw-bolder">'.$value.'</div>';
            })
            ->editColumn('isValid', function (Track $model){
                $styles = [0 => 'danger', 1 => 'success'];
                $style = $styles[$model->isValid] ?? 'info';
                $value = ($model->isValid === 1)  ? "Valid" : "Invalid";
                return '<div class="badge badge-light-'.$style.' fw-bolder">'.$value.'</div>';
            })
            ->editColumn('updated_at', function (Track $model) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($model->updated_at)->translatedFormat('j F, Y H:i:s');
            })
            ->editColumn('created_at', function (Track $model) {
                Carbon::setlocale(App::getLocale());
                return Carbon::parse($model->created_at)->translatedFormat('j F, Y H:i:s');
            })
            ->addColumn('action', content: function (Track $model) {
                return view(view: 'admin.tracks._action-menu', data: compact('model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Track $model
     * @return Builder
     */
    public function query(Track $model): Builder
    {
        //return $model->newQuery();
        return $model::where('content_id', $this->id)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('tracklist-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
                    ->responsive()
                    ->autoWidth(true)
                    ->parameters([
                        'scrollX'      => true,
                        'drawCallback' => 'function() { KTMenu.createInstances(); }',
                        'language' => ['url' => url('/vendor/datatables/lang/' . config('app.locale') . '.json')],
                    ])
//                    ->buttons('none')

                    ->buttons(
                        Button::raw('<i class="las la-arrow-alt-circle-left fs-2x"></i> Back to Content')->addClass('btn btn-sm btn-color-info btn-active-light-info')->action("window.location = '".route('admin.contents.edit', ['content' => $this->id])."';"),
                        Button::raw('<i class="las la-plus-circle fs-2x"></i> New')->addClass('btn btn-sm btn-active-light-info')->action("window.location = '".route('admin.tracks.create', ['id' => $this->id])."';"),)

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
            Column::make('order')->title('Sıra')->addClass('ps-5'),
            Column::make('id')->title('Track ID')->addClass('ps-0'),
            Column::make('title')->title('Track Title')->width(200),
            Column::make('link')->title('Track link')->width(200),
            Column::make('duration')->title('Duration'),
            Column::make('admin_id')->title('Narrator'),
            Column::make('soundscape_id')->title('Soundscape'),
            Column::make('volume')->title('Volume'),
            Column::make('isFree')->title('Free/Premium'),
            Column::make('isValid')->title('Valid'),
            Column::make('updated_at')->title('Güncellendi')->addClass('none'),
            Column::make('created_at')->title('Eklendi')->addClass('none'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
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
        return 'Tracks_'.date('YmdHis');
    }
}
