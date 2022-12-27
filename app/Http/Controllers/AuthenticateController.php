<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'id_card_number' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('error', 'Invalid NIK or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register()
    {
        return view('user.auth.register');
    }

    public function validates(Request $request)
    {

        $validatedData = $request->validate([
            'id_card_number' => 'required',
            'birth_date' => 'required|date',
            'mother_name' => 'required',
            'mother_birth_date' => 'required'
        ]);

        $resident = Resident::where('id_card_number', $validatedData['id_card_number'])->first();

        if ($resident == null || $resident->birth->birth_date->toDateString() != $validatedData['birth_date']) {
            return back()->with('alert', ['type' => 'danger', 'message' => 'Data does not matched with our records!']);
        }

        $mother = $resident->birth->mother;
        if ($mother->birth->name != $validatedData['mother_name'] || $mother->birth->birth_date->toDateString() != $validatedData['mother_birth_date']) {
            return back()->with('alert', ['type' => 'danger', 'message' => 'Data does not matched with our records!']);
        }

        return view('user.auth.register-form', ['resident' => $resident, 'mother' => 'mother']);
    }

    public function registered(Request $request)
    {
        $validatedData = $request->validate([
            'resident_id' => 'required',
            'id_card_number' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect(route('user.auth.login'))->with('alert', 'Registration success!');
    }
}