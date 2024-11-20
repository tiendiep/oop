<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class DeleteController extends UserController
{
    public function destroy($id)
{
    $user = $this->userRepository->findById($id);
    if (!$user) {  
        return response()->json([
            'error' => 'Người dùng không tồn tại!'
        ], 404);
    }
    $this->userRepository->delete($id);
    return response()->json([
        'message' => 'Người dùng đã được xóa thành công!'
    ], 200);
}


}