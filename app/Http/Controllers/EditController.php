<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use App\Models\City;
use App\Models\District;
use App\Models\Address;
use App\Models\Users;
use Illuminate\Http\Request;

class EditController extends UserController
{

    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $cities = City::all();
        $districts = District::all();     
        // return response()->json([
        //     'users' => $users,
        //     'cities'=>$cities,
        //     'districts'=>$districts
        // ]);
        return view('users.edit', [
            'user' => $user,
            'cities' => $cities,
            'districts' => $districts
        ]);
    }


    
    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'date' => 'required|date',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
        ]);
    
     
        $user = Users::findOrFail($id);
    
       
        $user->update([
            'name' => $validated['name'],
            'gender' => $validated['gender'],
            'date' => $validated['date'],
        ]);
    
   
        $address = Address::where('user_id', $id)->first();
        
        if ($address) {
           
            $address->update([
                'district_id' => $validated['district_id'],
            ]);
        } else {
            
            Address::create([
                'user_id' => $user->id,
                'district_id' => $validated['district_id'],
            ]);
        }
    

        return response()->json(['message' => 'User and address updated successfully'], 200);
    }
    
}