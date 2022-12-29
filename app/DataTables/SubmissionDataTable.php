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
            ->setRowId('id')
            ->addColumn('service_name', function ($data) {
                return $data->serviceCategory->name . ': ' . $data->service->name;
            })
            ->addColumn('status', function ($data) {
                $status = $data->status;
                $type = 'warning';
                if ($status == 'Accepted') $type = 'success';
                elseif ($status == 'Denied') $type = 'danger';
                return '<span class="badge badge-sm text-small text-bg-' . $type . '">' . $status . '</span>';
            })
            ->filterColumn('service_name', function (QueryBuilder $query, $keyword) {
                $query->whereRelation('serviceCategory', DB::raw('CONCAT(service_categories.name, ": ",services.name)'), 'LIKE', "%{$keyword}%");
                // ->orWhereRelation('service', 'services.name', 'LIKE', "%{$keyword}%");
            })
            ->filterColumn('status', function ($query, $keyword) {
                $query->where('status', 'LIKE', "%{$keyword}%");
            })
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-primary btn-sm" href="' . route('admin.submission.show', ['submission' => $data->ulid]) . '">Detail</a>';
            })
            ->rawColumns(['status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Submission $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Submission $model): QueryBuilder
    {
        $service_name = request()->get('service_name');
        return $model
            ->whereRelation('serviceCategory', DB::raw('CONCAT(service_categories.name, ": ",services.name)'), 'LIKE', "%{$service_name}%")
            ->select(['submissions.*'])->newQuery();
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
            Column::computed('DT_RowIndex')->title('#')->addClass('fw-bold')->width(0),
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