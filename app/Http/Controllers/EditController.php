<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use App\Models\City;
use App\Models\District;
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
   
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'city_id' => 'required|exists:city,id',
            'district_id' => 'required|exists:district,id',
            'date' => 'required|date',
        ]);

        
        $data = $request->only(['name', 'gender', 'city_id', 'district_id', 'date']);

        $user = Users::find($id);

        if (!$user) {
          
            return response()->json([
                'message' => 'Người dùng không tồn tại!',
            ], 404);
        }

      
        $user->update($data);
        return response()->json([
            'message' => 'Người dùng đã được cập nhật!',
            'data' => $user, 
        ], 200);
    }
}