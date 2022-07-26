<?php

namespace App\DataTables;

use App\Models\Hero;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HeroDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.hero.action')
            ->addIndexColumn()
            ->editColumn('content', function(Hero $hero) {
                if ($hero->type == "Gambar" || $hero->type == "Logo") {
                    $gambar = Storage::url($hero->content);
                    return "<img src='$gambar' style='width: 100px; height: 100px; object-fit:cover; border-radius: 4px;' />";
                }

                return $hero->content;
            })
            ->rawColumns(['action', 'content'])
            ->setRowId('id')
            ->rawColumns(['action', 'content']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Hero $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Hero $model): QueryBuilder
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
                    ->setTableId('hero-table')
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
            Column::make('type')->title('Tipe'),
            Column::make('content')->title('Isi'),
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
        return 'Hero_' . date('YmdHis');
    }
}
