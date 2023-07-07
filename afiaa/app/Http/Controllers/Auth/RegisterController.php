<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller{
    public function showRegistrationForm()
{
   // return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'required|string|max:255',
        'role' => 'required|integer',
        'gender' => 'required|integer',
        'birth_date' => 'required|date',
        'blood_type' => 'required|integer',
        'chronic_disease' => 'nullable|string|max:255',
        'genetic_disease' => 'nullable|string|max:255',
        'other_info' => 'nullable|string|max:255',
        'tall' => 'required|numeric',
        'weight' => 'required|numeric',
        'photo_url' => 'nullable|string|max:255',
        'univairsity_license_url' => 'nullable|string|max:255',
        'license_url' => 'nullable|string|max:255',
        'avaliabel_for_meeting' => 'required|boolean',
    ]);

    $user = User::create([
        'fname' => $request->input('fname'),
        'lname' => $request->input('lname'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'phone' => $request->input('phone'),
        'role' => $request->input('role'),
        'gender' => $request->input('gender'),
        'birth_date' => $request->input('birth_date'),
        'blood_type' => $request->input('blood_type'),
        'chronic_disease' => $request->input('chronic_disease'),
        'genetic_disease' => $request->input('genetic_disease'),
        'other_info' => $request->input('other_info'),
        'tall' => $request->input('tall'),
        'weight' => $request->input('weight'),
        'photo_url' => $request->input('photo_url'),
        'univairsity_license_url' => $request->input('univairsity_license_url'),
        'license_url' => $request->input('license_url'),
        'avaliabel_for_meeting' => $request->input('avaliabel_for_meeting'),
    ]);
          //if user based on role
    return redirect('/login')->with('status', 'Your account has been created. Please log in.');
    //else  wait cer valedation
}

}
