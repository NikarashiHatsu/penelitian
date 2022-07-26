<?php

namespace App\DataTables;

use App\Models\Footer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FooterDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.footer.action')
            ->addIndexColumn()
            ->setRowId('id')
            ->editColumn('content', function(Footer $footer) {
                if ($footer->type == "Logo" || $footer->type == "Logo Kecil") {
                    return "<img style='width: 100px; height: 100px; object-fit: cover; border-radius: 4px;' src='{$footer->file}' />";
                }

                return $footer->content;
            })
            ->editColumn('created_at', function(Footer $footer) {
                return $footer->created_at->isoFormat('LLL');
            })
            ->rawColumns(['action', 'content']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Footer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Footer $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('footer-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(3)
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
            Column::make('type')->title('Tipe'),
            Column::make('content')->title('Isi'),
            Column::make('created_at')->title('Tanggal Input'),
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
        return 'Footer_' . date('YmdHis');
    }
}
