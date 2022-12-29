<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceRequirementDataTable;
use App\Models\ServiceRequirement;
use Illuminate\Http\Request;
use Symfony\Component\Uid\Ulid;
use Illuminate\Support\Str;

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
        $sided = false;
        return view('admin.service.requirement.new', compact('sided'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'need_file' => 'required'
        ]);

        $validatedData['ulid'] = Str::lower(Ulid::generate(now()));
        ServiceRequirement::create($validatedData);
        return redirect(route('admin.service.requirement.index'))->with('alert', ['type' => 'success', 'message' => "Service requirement has been added!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceRequirement  $serviceRequirement
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceRequirement $serviceRequirement)
    {
        $sided = false;
        return view('admin.service.requirement.show', compact('sided', 'serviceRequirement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceRequirement  $serviceRequirement
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceRequirement $serviceRequirement)
    {
        $sided = false;
        return view('admin.service.requirement.edit', compact('serviceRequirement', 'sided'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'need_file' => 'required',
        ]);

        $validatedData['ulid'] = Ulid::generate(now());

        $serviceRequirement->update($validatedData);
        return redirect(route('admin.service.requirement.show', ['service_requirement' => $serviceRequirement->ulid]))->with('alert', ['message' => 'Service requirement has been updated!', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceRequirement  $serviceRequirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceRequirement $serviceRequirement)
    {
        $serviceRequirement->delete();
        return redirect(route('admin.service.requirement.index'))->with('alert', ['type' => 'success', 'message' => "Service requirement has been deleted!"]);
    }
}