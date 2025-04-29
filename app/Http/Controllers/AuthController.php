<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        if (session()->has('admin')) {
            session()->forget('admin');
            return redirect()
            ->route('admin')
            ->with('success', 'Admin logged out successfully!');
        }

        if (session()->has('doctor')) {
            session()->forget('doctor');
            return redirect()
            ->route('doctor.login')
            ->with('success', 'Doctor logged out successfully!');
        }

        if (session()->has('patient')) {
            session()->forget('patient');
            return redirect()
            ->route('patient.login')
            ->with('success', 'Patient logged out successfully!');
        }
        return redirect('/')->with('error', 'No active session found.');
    }
    public function logoutapi($email)
    {
        // Check for user in reg_user
        $user = DB::table('reg_user')->where('email', $email)->first();
    
        if ($user) {
            session(['patient' => $user]); // define session
            session()->forget('patient');  // forget session
            return response()->json(['message' => 'Patient logged out successfully!']);
        }
    
        // Check for doctor in reg_doc
        $doctor = DB::table('reg_doc')->where('email', $email)->first();
    
        if ($doctor) {
            session(['doctor' => $doctor]); // define session
            session()->forget('doctor');    // forget session
            return response()->json(['message' => 'Doctor logged out successfully!']);
        }
    
        // If not found in either
        return response()->json(['message' => 'Email not found in users or doctors!'], 404);
    }
}