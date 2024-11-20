<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use App\Models\City;
use App\Models\Users;
use App\Models\District;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

  
    public function index(Request $request)
    {  
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $perPage = (int)$perPage;
        $page = (int)$page;
        $offset= ($page - 1) * $perPage;
        
        $users = Users::leftJoin('city', 'user.city_id', '=', 'city.id') 
        ->leftJoin('district', 'user.district_id', '=', 'district.id')  
            ->select(
            'user.*',
                'city.citynameVn as city_name',  
                'district.districtVn as district_name'  
            )
        ->limit($perPage)  
        ->offset($offset)  
        ->get();
        $totalUser= Users::count();
        $totalUser = (int)$totalUser;
        $total = ceil($totalUser/$perPage);
        return response()->json([
            'total' => $totalUser,
            'total_pages' => $total,
            'current_page' => $page,
            'per_page' => $perPage,
            'data' => $users
        ]);
    }

}

