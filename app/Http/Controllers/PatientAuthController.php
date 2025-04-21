<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class PatientAuthController extends Controller
{
    public function showLogin()
    {
        return view('patient_login');
    }

    public function showRegister()
    {
        return view('patient_register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $user = DB::table('reg_user')
                           ->where('email', $request->email)
                           ->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            
            session(['patient' => $user]);
    
            return redirect('/')->with('success', 'Login successful!');
        }
    
        return redirect()->back()->with('error', 'Invalid credentials!');
    }
    
    

    public function register(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'sex' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'marital_status' => 'required|string',
            'nid' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
    
        
        $existing = DB::table('reg_user')->where('email', $request->email)->first();
    
        if ($existing) {
            return redirect()->back()->with('error', 'Email already exists!');
        }
    
        
        DB::table('reg_user')->insert([
            'name' => $request->name,
            'age' => $request->age,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'marital status' => $request->marital_status,
            'nid' => $request->nid,
            'height' => $request->height,
            'weight' => $request->weight,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('patient.login')->with('success', 'Registration successful! Please login.');
    }
    
    
}

