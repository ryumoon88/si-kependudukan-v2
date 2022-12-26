<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceDataTable;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceRequirement;
use Illuminate\Http\Request;
use SebastianBergmann\Comparator\Comparator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceDataTable $dataTable)
    {
        return $dataTable->render('admin.service.service.index', ['sided' => false]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ServiceCategory::all();
        $sided = false;
        return view('admin.service.service.new', compact('categories', 'sided',));
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
            'service_category_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $service = Service::create($validatedData);
        return redirect(route('admin.service.service.show', ['service' => $service->slug]))->with('alert', ['type' => 'success', 'message' => "Service has been added!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $sided = false;
        return view('admin.service.service.show', compact('service', 'sided'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $sided = false;
        $requirements = ServiceRequirement::all()->whereNotIn('id', $service->requirements->pluck('service_requirement_id')->toArray())->whereNotIn('service_id', $service->id);
        $categories = ServiceCategory::all();
        return view('admin.service.service.edit', compact('service', 'sided', 'requirements', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'service_category_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $service->update($validatedData);
        return redirect(route('admin.service.service.show', ['service' => $service->slug]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect(route('admin.service.service.index'))->with('alert', ['type' => 'success', 'message' => "Service has been deleted!"]);
    }
}