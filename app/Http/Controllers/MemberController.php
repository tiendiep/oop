<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class MemberController extends Controller
{
    public function index(Request $request)
    {  
        $perPage = $request->input('per_page', 10);  // Số lượng bản ghi trên mỗi trang
        $page = $request->input('page', 1);  // Trang hiện tại
        $perPage = (int)$perPage;
        $page = (int)$page;
        $offset = ($page - 1) * $perPage;

        // Sử dụng Query Builder để JOIN các bảng và lấy dữ liệu
        $users = Users::join('addresses', 'user.id', '=', 'addresses.user_id')
            ->join('districts', 'addresses.district_id', '=', 'districts.id')
            ->join('cities', 'districts.city_id', '=', 'cities.id')
            ->select(
                'user.id AS user_id',
                'user.name',
                'user.gender',
                'user.date',
                'cities.citynameVn AS city_name',
                'districts.districtVn AS district_name'
            )
            
            ->limit($perPage)
            ->offset($offset)
            ->get();
      
        // Tính tổng số thành viên
        $totalUser = Users::count();  // Đếm tổng số bản ghi trong bảng members
        $totalUser = (int)$totalUser;
        $total = ceil($totalUser / $perPage);  // Tổng số trang

        return response()->json([
            'total' => $totalUser,
            'total_pages' => $total,
            'current_page' => $page,
            'per_page' => $perPage,
            'data' => $users
        ]);
    }
}
