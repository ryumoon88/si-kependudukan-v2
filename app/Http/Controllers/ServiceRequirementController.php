<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceRequirementDataTable;
use App\Models\ServiceRequirement;
use Illuminate\Http\Request;

class ServiceRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceRequirementDataTable $dataTable)
    {
        return $dataTable->render('admin.service.requirement.index', ['sided' => false]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceRequirement  $serviceRequirement
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceRequirement $serviceRequirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceRequirement  $serviceRequirement
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceRequirement $serviceRequirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceRequirement  $serviceRequirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceRequirement $serviceRequirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceRequirement  $serviceRequirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceRequirement $serviceRequirement)
    {
        //
    }
}