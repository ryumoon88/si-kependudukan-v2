<?php

namespace App\Http\Controllers;

use App\DataTables\ResidentBirthDataTable;
use App\Models\ResidentBirth;
use Illuminate\Http\Request;

class ResidentBirthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResidentBirthDataTable $dataTable)
    {
        return $dataTable->render('admin.resident.birth.index', ['sided' => false]);
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
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function show(ResidentBirth $residentBirth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function edit(ResidentBirth $residentBirth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResidentBirth $residentBirth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResidentBirth $residentBirth)
    {
        //
    }
}
