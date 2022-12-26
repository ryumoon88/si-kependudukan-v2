<?php

namespace App\Http\Controllers;

use App\Models\ServiceHasRequirement;
use Illuminate\Http\Request;

class ServiceHasRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        ServiceHasRequirement::insert($request->except(['_token']));
        return json_encode(['status' => '200', 'message' => 'Requirement has been added!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceHasRequirement  $serviceHasRequirement
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceHasRequirement $serviceHasRequirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceHasRequirement  $serviceHasRequirement
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceHasRequirement $serviceHasRequirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceHasRequirement  $serviceHasRequirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceHasRequirement $serviceHasRequirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceHasRequirement  $serviceHasRequirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceHasRequirement $serviceHasRequirement)
    {
        $serviceHasRequirement->delete();
        return json_encode(['status' => '200', 'message' => 'Requirement has been removed from this service!']);
    }
}