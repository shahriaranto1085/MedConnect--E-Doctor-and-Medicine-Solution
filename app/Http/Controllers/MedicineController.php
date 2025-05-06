<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MedicineController extends Controller
{   
    public function showMedicines()
    {
        $medicines = DB::table('medicines')->get(); // Get all medicines from DB
        return view('medicine', compact('medicines'));
    }




    public function new_med_submit(Request $request)
{
    // Check if medicine already exists
    $existing = DB::table('medicines')->where('name', $request->name)->first();

    if ($existing) {
        return redirect()->back()->with('error', 'Medicine already exists!');
    }

    // Insert new medicine
    DB::table('medicines')->insert([
        'name' => $request->name,
        'type' => $request->type,
        'manufacturer' => $request->manufacturer,
        'description' => $request->description,
        'weight' => $request->weight,
        'price' => $request->price,
        'image_path' => $request->image_path,
        'stock' => $request->stock,
    ]);

    return redirect()->back()->with('success', 'Medicine added successfully!');
}


public function search(Request $request)
{
    $query = $request->input('query');

    $medicines = DB::table('medicines')
        ->where('name', 'like', '%' . $query . '%')
        ->get();

    return view('medicine', compact('medicines'));
}

    
}
