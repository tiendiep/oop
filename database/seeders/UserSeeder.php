<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo và lưu người dùng đầu tiên (Admin User)
        $user1 = new User();
        $user1->name = 'Admin User';
        $user1->email = 'admin@example.com';
        $user1->password = Hash::make('123456');
        $user1->role = 'admin'; // Thêm role nếu có
        $user1->created_at = now();
        $user1->updated_at = now();
        $user1->save();

        // Tạo và lưu người dùng thứ hai (Manager User)
        $user2 = new User();
        $user2->name = 'Manager User';
        $user2->email = 'manager@example.com';
        $user2->password = Hash::make('123456');
        $user2->role = 'manager'; // Thêm role nếu có
        $user2->created_at = now();
        $user2->updated_at = now();
        $user2->save();

        // Tạo và lưu người dùng thứ ba (Regular User)
        $user3 = new User();
        $user3->name = 'Regular User';
        $user3->email = 'user@example.com';
        $user3->password = Hash::make('123456');
        $user3->role = 'user'; // Thêm role nếu có
        $user3->created_at = now();
        $user3->updated_at = now();
        $user3->save();
    }
}
