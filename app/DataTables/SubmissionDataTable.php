<?php

namespace App\DataTables;

use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SubmissionDataTable extends DataTable
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
            ->addColumn('service_name', function ($data) {
                return $data->serviceCategory->name . ': ' . $data->service->name;
            })
            ->filterColumn('service_name', function ($query, $keyword) {
                $query->whereRelation('serviceCategory', 'service_categories.name', 'LIKE', "%{$keyword}%")
                    ->orWhereRelation('service', 'services.name', 'LIKE', "%{$keyword}%");
            })
            ->setRowId('id')
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-primary btn-sm" href="' . route('admin.submission.show', ['submission' => $data->ulid]) . '">Detail</a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Submission $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Submission $model): QueryBuilder
    {
        return $model->select(['submissions.*'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('submission-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->ordering(false);
        //->dom('Bfrtip')
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')->title('#'),
            Column::make('submitter.name')->orderable(false),
            Column::make('service_name'),
            Column::make('status'),
            Column::make('created_at'),
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
        return 'Submission_' . date('YmdHis');
    }
}