<?php

namespace App\DataTables;

use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServiceCategoryDataTable extends DataTable
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
            ->addIndexColumn()
            ->setRowId('id')
            ->addColumn('total_service', function ($data) {
                return $data->services->count();
            })
            ->addColumn('action', function ($data) {
                return '<div class="dropdown">
                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="' . route('admin.service.category.show', ['service_category' => $data->slug]) . '">Details</a></li>
                        <li><a class="dropdown-item" href="#">Edit</a></li>
                        <li><a class="dropdown-item" href="#">Delete</a></li>
                    </ul>
                </div>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ServiceCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceCategory $model): QueryBuilder
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
            ->setTableId('servicecategory-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->ordering(false);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')->title('#')->addClass('fw-bold')->width(0),
            Column::make('name'),
            Column::make('total_service')->addClass('text-center'),
            Column::computed('action')->width(0)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'ServiceCategory_' . date('YmdHis');
    }
}