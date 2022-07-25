<?php

namespace App\DataTables;

use App\Models\Cms;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CmsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'dashboard.cms.action')
            ->addIndexColumn()
            ->setRowId('id')
            ->editColumn('feature', function(Cms $cms) {
                $badge_class = "";
                switch ($cms->feature) {
                    case 'Berita': $badge_class = "bg-blue"; break;
                    default: $badge_class = "bg-gray"; break;
                }

                return "<span class='badge $badge_class'>
                    {$cms->feature}
                </span>";
            })
            ->editColumn('description', function (Cms $cms) {
                return mb_strimwidth(strip_tags($cms->description), 0, 255, '...');
            })
            ->rawColumns(['feature', 'action', 'description']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Cms $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cms $model): QueryBuilder
    {
        return $model->newQuery()
            ->withCount('attachments');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('cms-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')->title('#'),
            Column::make('feature')->title('Fitur'),
            Column::make('writer')->title('Penulis'),
            Column::make('description')->title('Deskripsi'),
            Column::computed('attachments_count')->title('Jumlah Lampiran'),
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center')
                    ->title('opsi'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Cms_' . date('YmdHis');
    }
}
