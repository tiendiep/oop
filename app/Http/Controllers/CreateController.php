<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use App\Models\City;
use App\Models\District;
use App\Models\Address;
use App\Models\Users;
use Illuminate\Http\Request;

class CreateController extends UserController
{
    
    public function create()
    {
        $cities = City::all();  
        $districts = District::all(); 

        return response()->json([
            'cities' => $cities,
            'districts' => $districts,
        ]);
    }

    public function store(Request $request)
{

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'gender' => 'required|string|max:50',
        'date' => 'required|date',
        'city_id' => 'required|exists:cities,id',
        'district_id' => 'required|exists:districts,id',
    ]);


    $user = Users::create([
        'name' => $validated['name'],
        'gender' => $validated['gender'],
        'date' => $validated['date'],
    ]);

    Address::create([
        'district_id' => $validated['district_id'],
        'user_id' => $user->id,
    ]);


    return response()->json(['message' => 'User and address created successfully'], 201);
}

    
}
