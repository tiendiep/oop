<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class CreateController extends UserController
{
    // Hàm lấy dữ liệu các thành phố và quận
    public function create()
    {
        $cities = City::all();  // Lấy tất cả thành phố
        $districts = District::all();  // Lấy tất cả quận

        return response()->json([
            'cities' => $cities,
            'districts' => $districts,
        ]);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'city_id' => 'required|exists:city,id',  
            'district_id' => 'required|exists:district,id', 
            'date' => 'required|date',
        ]);

  
        $data = $request->only(['name', 'gender', 'city_id', 'district_id', 'date']);

      
        $city = City::find($data['city_id']);
        $district = District::find($data['district_id']);

      
        if (!$city || !$district) {
            return response()->json([
                'message' => 'Thành phố hoặc quận không hợp lệ!',
            ], 400); 
        }

   
        $user = $this->userRepository->create($data);

       
        return response()->json([
            'message' => 'Người dùng đã được tạo thành công!',
            'data' => $user, 
        ], 201);
    }
}
