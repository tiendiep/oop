<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class SearchController extends UserController
{
    public function search(Request $request)
    {
     $name = $request->input('name');
    $cityName = $request->input('city');
    $districtName= $request->input('district');
    $date = $request->input('date');
    $orderBy = $request->input('orderBy'); // Thêm mặc định cho orderBy
    $direction = $request->input('direction');
  
    $users = $this->userRepository->search($name, $cityName, $date, $districtName, $orderBy, $direction);
        
        return response()->json([
            'users' => $users
        ]);
    }

}