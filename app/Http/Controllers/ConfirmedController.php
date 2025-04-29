<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmedController extends Controller
{
    public function confirmed_patient()
{
    $docName = session('doctor')->name; 

    if (!$docName) {
        return redirect()->back()->with('error', 'Session expired. Please login again.');
    }

    $doctor = DB::table('reg_doc')
    ->where('name', $docName)
    ->first();

    if (!$doctor) {
        return redirect()->back()->with('error', 'Doctor not found.');
    }

    // Now patient is guaranteed to exist
    $confirm = DB::table('consultation')
        ->where('confirmed', 'yes')
        ->orderBy('updated_at', 'desc')
        ->get();

    foreach ($confirm as $confirmed) {
        $patient = DB::table('reg_user')->where('email', $confirmed->user_email)->first();
        $confirmed->patient_name = $patient ? $patient->name : 'Unknown Patient';
    }

    return view('confirmed.patient', compact('confirm'));
}  

public function send_message($email)
{
    // Get patient info by email
    $patient = DB::table('reg_user')->where('email', $email)->first();

    if (!$patient) {
        return redirect()->back()->with('error', 'Patient not found.');
    }

    // Get doctor info from session
    $doctor = session('doctor');

    if (!$doctor) {
        return redirect()->back()->with('error', 'Session expired. Please login again.');
    }

    return view('message.send_message', compact('patient', 'doctor'));
}

public function confirmed_doctor()
{
    $patient = session('patient'); 

    if (!$patient) {
        return redirect()->back()->with('error', 'Session expired. Please login again.');
    }

    $confirm = DB::table('consultation')
        ->where('confirmed', 'yes')
        ->orderBy('updated_at', 'desc')
        ->get();

    foreach ($confirm as $confirmed) {
        $doctor = DB::table('reg_doc')->where('email', $confirmed->doc_email)->first();
        $confirmed->doctor_name = $doctor ? $doctor->name : 'Unknown Doctor';
    }

    return view('confirmed.doctor', compact('confirm'));
}


public function send_message_doctor($email)
{
    // Get doctor info by email
    $doctor = DB::table('reg_doc')->where('email', $email)->first();

    if (!$doctor) {
        return redirect()->back()->with('error', 'Doctor not found.');
    }

    // Get patient info from session
    $patient = session('patient');

    if (!$patient) {
        return redirect()->back()->with('error', 'Session expired. Please login again.');
    }

    return view('message.send_message_patient', compact('patient', 'doctor'));
}

    

}
