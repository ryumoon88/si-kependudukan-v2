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
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Submission $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Submission $model): QueryBuilder
    {
        // $query = Submission::leftJoin('users', 'submissions.submitter_id', '=', 'users.id')
        //     ->join('residents', 'users.resident_id', '=', 'residents.id')
        //     ->join('resident_births', 'residents.resident_birth_id', '=', 'resident_births.id')
        //     ->join('services', 'submissions.service_id', '=', 'services.id')
        //     ->join('service_categories', 'services.service_category_id', '=', 'service_categories.id')
        //     ->select(['submissions.id', 'resident_births.name', 'CONCAT(`service_categories`.`name`, ": ", `services`.`name`) as service_name', 'submissions.status', 'submissions.accepted_by', 'submissions.created_at'])
        //     ->orderBy('submissions.created_at');

        // leftJoin('users', 'submissions.submitter_id', '=', 'users.id')
        //     ->join('residents', 'users.resident_id', '=', 'residents.id')
        //     ->join('resident_births', 'residents.resident_birth_id', '=', 'resident_births.id')
        //     ->join('services', 'submissions.service_id', '=', 'services.id')
        //     ->join('service_categories', 'services.service_category_id', '=', 'service_categories.id')
        //     ->select(['submissions.id', 'resident_births.name', 'CONCAT(`service_categories`.`name`, ": ", `services`.`name`) as service_name', 'submissions.status', 'submissions.accepted_by', 'submissions.created_at'])
        //     ->orderBy('submissions.created_at');

        // return $model->select(['submissions.id', 'resident_births.name', DB::raw('CONCAT(`service_categories`.`name`, ": ", `services`.`name`) as service_name'), 'submissions.status', 'submissions.accepted_by', 'submissions.created_at'])
        //     ->leftJoin('users', 'submissions.submitter_id', '=', 'users.id')
        //     ->join('residents', 'users.resident_id', '=', 'residents.id')
        //     ->join('resident_births', 'residents.resident_birth_id', '=', 'resident_births.id')
        //     ->join('services', 'submissions.service_id', '=', 'services.id')
        //     ->join('service_categories', 'services.service_category_id', '=', 'service_categories.id')
        //     ->orderBy('submissions.created_at')->newQuery();
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
            //->dom('Bfrtip')
            ->orderBy(0);
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
            Column::make('submitter.birth.name')->orderable(false),
            Column::make('service_name'),
            Column::make('status')
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