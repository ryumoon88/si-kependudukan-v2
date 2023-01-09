<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sided = false;
        return view('admin.profile.index', compact('sided'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg',
            'remove-image' => 'in:true,false',
            'about' => 'required|string',
            'phone_number' => 'required|max:13',
            'email' => 'required|email'
        ]);

        if ($request->get('remove-image') == 'true') {
            $user->getFirstMedia('profile-images')?->delete();
        }

        if ($request->hasFile('image')) {
            if ($user->hasMedia('profile-images'))
                $user->getFirstMedia('profile-images')->delete();
            $user->addMediaFromRequest('image')->toMediaCollection('profile-images');
        }
        $phone_number = $validatedData['phone_number'];
        $validatedData = Arr::except($validatedData, ['remove-image', 'image', 'phone_number']);
        $user->update($validatedData);
        $user->resident->update(['phone_number' => $phone_number]);
        return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Data updated!']);
    }

    public function change_password(Request $request)
    {
        $rules = [
            'password' => 'required',
            'newpassword' => 'required',
            'newpassword_confirmation' => 'required|same:newpassword'
        ];

        $messages = [
            'newpassword_confirmation.same' => 'This field must match the password above.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->messages());
        if (!Hash::check($request->password, Auth::user()->getAuthPassword()))
            return redirect()->back()->withErrors(['password' => "The password is not match with our records!"]);
        if (Hash::check($request->newpassword, Auth::user()->getAuthPassword()))
            return redirect()->back()->withErrors(['newpassword' => "The password can not be the same as the old password!"]);
        Auth::user()->update(['password' => Hash::make($request->newpassword)]);
        return back()->with('alert', ['type' => 'success', 'message' => 'Password changed']);
    }
}