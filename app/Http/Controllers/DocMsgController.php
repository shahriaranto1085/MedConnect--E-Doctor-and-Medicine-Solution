<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DocMsgController extends Controller
{
    public function view_messages($email)
{
    $doctor = session('doctor');

    if (!$doctor) {
        return redirect()->back()->with('error', 'Session expired. Please login again.');
    }

    $patient = DB::table('reg_user')->where('email', $email)->first();

    if (!$patient) {
        return redirect()->back()->with('error', 'Patient not found.');
    }

    $messages = DB::table('messages')
        ->where('doctor_email', $doctor->email)
        ->where('patient_email', $patient->email)
        ->orderBy('created_at', 'asc')
        ->get();

    return view('chat.chat_doc', compact('messages', 'patient', 'doctor'));
}
public function send_message_post(Request $request)
{
    $doctor = session('doctor');

    if (!$doctor) {
        return redirect()->back()->with('error', 'Session expired. Please login again.');
    }

    DB::table('messages')->insert([
        'doctor_email' => $doctor->email,
        'patient_email' => $request->patient_email,
        'sender_role' => 'doctor',
        'message' => $request->message,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->back();
}

}
