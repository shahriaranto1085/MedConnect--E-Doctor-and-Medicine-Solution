<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConsultationController extends Controller
{
public function book(Request $request, $doc_email)
{
    $user_email = session('patient')->email;

    $time = $request->input('time');


    DB::table('consultation')->insert([
        'doc_email' => $doc_email,
        'user_email' => $user_email,
        'time' => $time,
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Appointment booked successfully!');
}

    public function pending()
{
    $userEmail = session('patient')->email;

    $pendingAppointments = DB::table('consultation')
        ->where('user_email', $userEmail)
        ->where('confirmed', 'no')
        ->get();

    // Get doctor details from reg_doc
    $doctors = DB::table('reg_doc')
        ->whereIn('email', $pendingAppointments->pluck('doc_email'))
        ->get()
        ->keyBy('email');

    return view('pending_consultation', compact('pendingAppointments', 'doctors'));
}

public function update(Request $request, $id)
{
    DB::table('consultation')->where('id', $id)->update([
        'time' => $request->input('time'),
    ]);

    return redirect()->route('pending_consultation')->with('success', 'Appointment time updated.');
}

public function cancel($id)
{
    DB::table('consultation')->where('id', $id)->delete();

    return redirect()->route('pending_consultation')->with('success', 'Appointment cancelled.');
}
    

public function confirm($id)
{
    DB::table('consultation')
        ->where('id', $id)
        ->update(['confirmed' => 'yes']);

    return redirect()->back()->with('success', 'Consultation confirmed.');
}

public function pendingPatients()
{
    $doctorEmail = session('doctor')->email;

    // Fetch all pending consultations
    $pendingAppointments = DB::table('consultation')->where('doc_email', $doctorEmail)
        ->where('confirmed', 'no')
        ->get();

    // Get patient info for each pending consultation
    $patients = [];
    foreach ($pendingAppointments as $appt) {
        $patient = DB::table('reg_user')->where('email', $appt->user_email)->first();
        if ($patient) {
            $patients[$appt->user_email] = $patient;
        }
    }

    return view('pending_patient', compact('pendingAppointments', 'patients'));
}




}