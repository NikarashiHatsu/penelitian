<?php

namespace App\DataTables;

use App\Models\Peneliti;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PenelitiDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.skema-penelitian.action')
            ->addIndexColumn()
            ->editColumn('file', function(Peneliti $peneliti) {
                return "<img src='{$peneliti->file}' style='width: 100px; height: 100px; object-fit:cover; border-radius: 4px;' />";
            })
            ->setRowId('id')
            ->rawColumns(['action', 'file']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Peneliti $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Peneliti $model): QueryBuilder
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
                    ->setTableId('peneliti-table')
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
            Column::make('file')->title('Foto'),
            Column::make('name')->title('Nama'),
            Column::make('detail')->title('Detail'),
            Column::make('facebook'),
            Column::make('twitter'),
            Column::make('instagram'),
            Column::make('linkedin'),
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
        return 'Peneliti_' . date('YmdHis');
    }
}
