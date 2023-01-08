<?php

namespace App\Http\Controllers;

use App\DataTables\ResidentBirthDataTable;
use App\Models\ResidentBirth;
use Illuminate\Http\Request;
use Symfony\Component\Uid\Ulid;

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
        return view('admin.resident.birth.new', ['sided' => false]);
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
            'father_id' => 'required',
            'mother_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required'
        ]);

        $validatedData['ulid'] = Ulid::generate(now());

        $residentBirth = ResidentBirth::insert($validatedData);
        return redirect(route('admin.resident.birth.show', ['resident_birth' => $residentBirth->ulid]))->with('alert', ['type' => 'success', 'message' => 'New Resident Birth has been added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function show(ResidentBirth $residentBirth)
    {
        $sided = false;
        return view('admin.resident.birth.show', compact('residentBirth', 'sided'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function edit(ResidentBirth $residentBirth)
    {
        $sided = false;
        return view('admin.resident.birth.edit', compact('residentBirth', 'sided'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required'
        ]);
        $residentBirth->update($validatedData);
        return redirect(route('admin.resident.birth.show', ['resident_birth' => $residentBirth->ulid]))->with('alert', ['type' => 'success', 'message' => 'Resident birth data has been updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResidentBirth  $residentBirth
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResidentBirth $residentBirth)
    {
        $residentBirth->delete();
        return redirect(route('admin.resident.birth.index'))->with('alert', ['type' => 'success', 'message' => 'Resident birth data has deleted!']);
    }
}