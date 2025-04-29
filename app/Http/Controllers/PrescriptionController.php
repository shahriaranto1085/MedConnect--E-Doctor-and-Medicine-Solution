<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    public function create()
    {
        return view('prescription.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email',
            'diseases' => 'required|string',
            'doses' => 'required|string',
        ]);

        $doc_mail = DB::table('reg_doc')
        ->where('name', session('doctor')->name)

        ->first();

        DB::table('prescriptions')->insert([
            'doc_email' => $doc_mail->email,
            'user_email' => $request->user_email,
            'diseases' => $request->diseases,
            'doses' => $request->doses,
            'updated_at' => now(),
        ]);

        return redirect()
        ->back()
        ->with('success', 'Prescription added successfully!');
    }

    public function patient_view()
    {
        $patientName = session('patient')->name; // Get patient's name from session
    
        if (!$patientName) {
            // No patient in session
            return redirect()->back()->with('error', 'Session expired. Please login again.');
        }
    
        $patient = DB::table('reg_user')->where('name', $patientName)->first();
    
        if (!$patient) {
            // No such patient found
            return redirect()->back()->with('error', 'Patient not found.');
        }
    
        // Now patient is guaranteed to exist
        $prescriptions = DB::table('prescriptions')
            ->where('user_email', $patient->email)
            ->orderBy('updated_at', 'desc')
            ->get();
    
        foreach ($prescriptions as $prescription) {
            $doctor = DB::table('reg_doc')->where('email', $prescription->doc_email)->first();
            $prescription->doctor_name = $doctor ? $doctor->name : 'Unknown Doctor';
        }
    
        return view('prescription.prescriptions', compact('prescriptions'));
    }

    public function view_prescription($id)
{
    // Get prescription by id
    $prescription = DB::table('prescriptions')->where('id', $id)->first();

    if (!$prescription) {
        return redirect()->back()->with('error', 'Prescription not found.');
    }

    // Get doctor info
    $doctor = DB::table('reg_doc')->where('email', $prescription->doc_email)->first();

    // Get patient info
    $patient = DB::table('reg_user')->where('email', $prescription->user_email)->first();

    return view('prescription.individual_prescription', compact('prescription', 'doctor', 'patient'));
}

    
 

}

