<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FitnessTrackerController extends Controller
{
    public function calculateBMI()
    {
        $user = session('patient');
        if (!$user) {
            return redirect()->route('patient.login');
        }

        $data = DB::table('reg_user')->where('email', $user->email)->first();

        if (!$data || !$data->height || !$data->weight) {
            return view('bmi')->with('bmi', null)->with('message', 'Height or weight info not found!');
        }

        $height_m = $data->height / 100;
        $bmi = round($data->weight / ($height_m * $height_m), 2);

        $age = $data->age;

        if ($bmi < 18.5) {
            $comment = "You're underweight.";
        } elseif ($bmi < 25) {
            $comment = "You're in a healthy range.";
        } elseif ($bmi < 30) {
            $comment = "You're overweight.";
        } else {
            $comment = "You are obese.";
        }

        return view('bmi', [
            'bmi' => $bmi,
            'age' => $age,
            'height' => $data->height,
            'weight' => $data->weight,
            'comment' => $comment,
            'name' => $data->name,
            'message' => null
        ]);
    }

    

    public function weightLossGoal()
    {
        $user = session('patient');
        if (!$user) {
            return redirect()->route('patient.login');
        }

        $data = DB::table('reg_user')->where('email', $user->email)->first();

        if (!$data || !$data->height || !$data->weight || !$data->age) {
            return view('weight_goal')->with([
                'error' => 'Missing height, weight, or age data.'
            ]);
        }

        $heightInMeters = $data->height / 100;
        $currentBmi = $data->weight / ($heightInMeters * $heightInMeters);

        $targetBmi = 29.9;
        $targetWeight = $targetBmi * ($heightInMeters * $heightInMeters);

        $weightToLose = $currentBmi >= 30 ? $data->weight - $targetWeight : 0;

        return view('weight_goal')->with([
            'name' => $data->name,
            'age' => $data->age,
            'height' => $data->height,
            'weight' => $data->weight,
            'currentBmi' => round($currentBmi, 2),
            'weightToLose' => round($weightToLose, 2),
            'targetWeight' => round($targetWeight, 2),
        ]);
    }
    public function weightLossGoalemail($email)
{
    $user = DB::table('reg_user')->where('email', $email)->first();

    if (!$user || !$user->height || !$user->weight || !$user->age) {
        return response()->json(['error' => 'User not found or missing height, weight, or age data.'], 404);
    }

    $heightInMeters = $user->height / 100;
    $currentBmi = $user->weight / ($heightInMeters * $heightInMeters);

    $targetBmi = 29.9;
    $targetWeight = $targetBmi * ($heightInMeters * $heightInMeters);
    $weightToLose = $currentBmi >= 30 ? $user->weight - $targetWeight : 0;

    return response()->json([
        'name' => $user->name,
        'age' => $user->age,
        'height' => $user->height,
        'weight' => $user->weight,
        'currentBmi' => round($currentBmi, 2),
        'targetWeight' => round($targetWeight, 2),
        'weightToLose' => round($weightToLose, 2),
    ]);
}

}


