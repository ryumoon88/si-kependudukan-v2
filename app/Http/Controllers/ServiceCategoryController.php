<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceCategoryDataTable;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.service.category.index', ['sided' => false]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.category.new', ['sided' => false]);
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
            'description' => 'required'
        ]);
        ServiceCategory::create($validatedData);
        return redirect(route('admin.service.category.index'))->with('alert', ['type' => 'success', 'message' => "Service has been added!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCategory $serviceCategory)
    {
        $sided = false;
        return view('admin.service.category.show', compact('serviceCategory', 'sided'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        $sided = false;
        return view('admin.service.category.edit', compact('serviceCategory', 'sided'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $validatedData['excerpt'] = Str::limit(trim(strip_tags($request->input('description'))), 100);

        $serviceCategory->update($validatedData);
        return redirect(route('admin.service.category.show', ['service_category' => $serviceCategory->slug]))->with('alert', ['message' => 'Service category has been updated!', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();
        return redirect(route('admin.service.category.index'))->with('alert', ['type' => 'success', 'message' => "Service category has been deleted!"]);
    }
}