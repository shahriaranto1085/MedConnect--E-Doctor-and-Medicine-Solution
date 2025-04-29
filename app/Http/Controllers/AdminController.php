<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function admin_login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $admin = DB::table('admin')
                           ->where('name', $request->name)
                           ->first();
        
        if ($admin && $request->password === $admin->password) {
            // Set session manually
            session(['admin' => $admin]);
    
            return redirect('/admin/doctors')->with('success', 'Login successful! Welcome Admin!');
        }    
        return redirect()
        ->back()
        ->with('error', 'Imposter Detected!Try Harder!!!!');
        
    }

    public function showUnverified()
    {
        $doctors = DB::table('reg_doc')
                  ->where('verified', 'no')
                  ->get();
        return view('admin.doctors', compact('doctors'));
        //return response()->json($doctors);
    }

    public function acceptDoctor($email)
    {
        DB::table('reg_doc')
        ->where('email', $email)
        ->update(['verified' => 'yes']);
        return redirect()
        ->route('admin.doctors')
        ->with('success', 'Doctor verified!');

       // return response()->json([
           // 'message' => 'Doctor verified!',
           // 'doctor' => $doctor
       /// ]);
    }
    

    public function deleteDoctor($email)
    {
        DB::table('reg_doc')
        ->where('email', $email)
        ->delete();
        return redirect()
        ->route('admin.doctors')
        ->with('success', 'Doctor deleted!');
    }

    public function viewProfile($email)
    {
        $doctor = DB::table('reg_doc')
        ->where('email', $email)
        ->first();
        return view('admin.doctor_profile', compact('doctor'));
    }
}
