<?php

namespace App\Http\Controllers;

use App\DataTables\ResidentDataTable;
use App\Models\Resident;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Symfony\Component\Uid\Ulid;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResidentDataTable $dataTable)
    {
        return $dataTable->render('admin.resident.registered.index', ['sided' => false]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resident.registered.new', ['sided' => false]);
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
            'resident_birth_id' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'blood_type' => 'required',
            'address' => 'required',
        ]);

        $validatedData['id_card_number'] = IdGenerator::generate(['table' => 'residents', 'field' => 'id_card_number', 'length' => 16, 'prefix' => '137', 'reset_on_prefix_change' => true]);
        $validatedData['ulid'] = Ulid::generate(now());
        Resident::insert($validatedData);
        return redirect(route('admin.resident.registered.show', ['resident' => $validatedData['ulid']]))->with('alert', ['type' => 'success', 'message' => 'New Resident Birth has been added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        $sided = false;
        return view('admin.resident.registered.show', compact('resident', 'sided'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident)
    {
        $sided = false;
        return view('admin.resident.registered.edit', compact('resident', 'sided'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'phone_number' => 'required',
            'blood_type' => 'required',
            'address' => 'required',
        ]);
        $resident->update($validatedData);
        return redirect(route('admin.resident.registered.show', ['resident' => $resident->ulid]))->with('alert', ['type' => 'success', 'message' => 'Resident data has been updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident)
    {
        $resident->delete();
        return redirect(route('admin.resident.registered.index'))->with('alert', ['type' => 'success', 'message' => 'Resident data has deleted!']);
    }
}