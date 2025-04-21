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
}
