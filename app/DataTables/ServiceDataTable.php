<?php

namespace App\DataTables;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServiceDataTable extends DataTable
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
            ->addColumn('name', function ($data) {
                return $data->category->name . ': ' . $data->name;
            })
            ->filterColumn('name', function (QueryBuilder $query, $keyword) {
                $query->where('name', "LIKE", "%{$keyword}%")
                    ->orWhereRelation('category', 'name', "LIKE", "%{$keyword}%");
            })
            ->addColumn('action', function ($data) {
                return '<div class="dropdown">
                <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="' . route('admin.service.service.show', ['service' => $data->slug]) . '">Details</a></li>
                        <li><a class="dropdown-item" href="' . route('admin.service.service.edit', ['service' => $data->slug]) . '">Edit</a></li>
                        <li><form action="' . route('admin.service.service.destroy', ['service' => $data->slug]) . '" method="POST" id="delete-form">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn dropdown-item">Delete</button></form></li>
                    </ul>
                </div>
                ';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Service $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Service $model): QueryBuilder
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
            ->setTableId('service-table')
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
            Column::computed('DT_RowIndex')->addClass('fw-bold')->width(0)->title('#'),
            Column::make('name')->orderable(false),
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
        return 'Service_' . date('YmdHis');
    }
}