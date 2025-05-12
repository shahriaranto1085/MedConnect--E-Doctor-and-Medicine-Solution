<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorAuthController extends Controller
{
    public function showLogin()
    {
        return view('doc_login');
    }

    public function showRegister()
    {
        return view('doc_register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $user = DB::table('reg_doc')
                ->where('email', $request->email)
                ->first();
    
        if (!$user) {
            return back()->with('error', 'Wrong credentials!');
        }
    
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Wrong credentials!');
        }
    
        if ($user->verified === 'yes') {
            session(['doctor' => $user]); // You can also store email if needed
            return redirect()->route('doctor.dashboard');
        } else {
            session(['pending_doctor_email' => $user->email]);
            return redirect()->route('doctor.notVerified');
        }
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
            'nid' => 'required|string',
            'password' => 'required|string|min:6',
            'specialization' => 'required|string',
            'degree' => 'required|string',
            'institution' => 'required|string',
            'bmdc' => 'required|string',
            'worplc' => 'required|string',
        ]);
    
        // Check if email already exists
        $existing = DB::table('reg_doc')
                   ->where('email', $request->email)
                   ->first();
    
        if ($existing) {
            return redirect()
            ->back()
            ->with('error', 'Email already exists!');
        }
    
        // Insert into patient table
        DB::table('reg_doc')->insert([
            'name' => $request->name,
            'age' => $request->age,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'email' => $request->email,
            'specialization' => $request->specialization,
            'degree' => $request->degree,
            'nid' => $request->nid,
            'address' => $request->address,
            'institution' => $request->institution, 
            'bmdc' => $request->bmdc,
            'password' => Hash::make($request->password),
            'worplc' => $request->worplc,


        ]);
    
        return redirect()->route('doctor.login')
        ->with('success', 'Registration successful! Please login.');
    }

    public function notVerified(Request $request) {
    
        return view('not_verified');
    }
    



    public function logout(Request $request)
    {
        Auth::logout();
        session()->flush();
        return redirect('/')->with('success', 'Logged out successfully!');
    } 
    public function edit()
{
    $doctor = session('doctor');
    
    if (!$doctor) {
        return redirect()->route('doctor.login')->with('error', 'You must be logged in.');
    }

    return view('doc_profile', ['doctor' => $doctor]);
}



  public function update(Request $request)
{
    $doctor = session('doctor');

    if (!$doctor) {
        return redirect()->route('doctor.login')->with('error', 'You must be logged in.');
    }

    $request->validate([
        'name' => 'required|string',
        'age' => 'required|integer',
        'phone' => 'required|string',
        'email' => 'required|email',
        'schedule' => 'nullable|string',
        'time' => 'nullable|string',
        'password' => 'nullable|string|min:6',
    ]);

    $data = [
        'name' => $request->name,
        'age' => $request->age,
        'phone' => $request->phone,
        'email' => $request->email,
        'schedule' => $request->schedule,
        'time' => $request->time,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    DB::table('reg_doc')
        ->where('email', $doctor->email)
        ->update($data);

    // Refresh session data
    $updatedDoctor = DB::table('reg_doc')->where('email', $doctor->email)->first();
    session(['doctor' => $updatedDoctor]);

    return redirect()->route('doc.profile')->with('success', 'Profile updated successfully!');
}

        public function index(Request $request)
    {
        $query = $request->input('query');

        // If search query exists, filter doctors
        if ($query) {
            $doctors = DB::table('reg_doc')->where('name', 'like', "%{$query}%")
                            ->orWhere('specialization', 'like', "%{$query}%")
                            ->get();
        } else {
            $doctors = DB::table('reg_doc')->get(); // Get all doctors if no search query
        }

        // Pass to view
        return view('view_doc', [
            'doctors' => $doctors,
        ]);
    }

    



}





