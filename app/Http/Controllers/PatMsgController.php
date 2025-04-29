<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatMsgController extends Controller
{
    public function patient_view_messages($email)
{
    $patient = session('patient');

    if (!$patient) {
        return redirect()->back()->with('error', 'Session expired. Please login again.');
    }

    $doctor = DB::table('reg_doc')->where('email', $email)->first();

    if (!$doctor) {
        return redirect()->back()->with('error', 'Doctor not found.');
    }

    $messages = DB::table('messages')
        ->where('doctor_email', $doctor->email)
        ->where('patient_email', $patient->email)
        ->orderBy('created_at', 'asc')
        ->get();

    return view('chat.chat_pat', compact('messages', 'doctor', 'patient'));
}

public function patient_send_message_post(Request $request)
{
    $patient = session('patient');

    if (!$patient) {
        return redirect()->back()->with('error', 'Session expired. Please login again.');
    }

    DB::table('messages')->insert([
        'doctor_email' => $request->doctor_email,
        'patient_email' => $patient->email,
        'sender_role' => 'patient',
        'message' => $request->message,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->back();
}

}
