<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PersonSeender extends Seeder
{
    public function run()
    {
        // Dữ liệu cần chèn vào bảng user
        $cities = [
            1 => 'Hà Nội',
            2 => 'TP Hồ Chí Minh',
            3 => 'Đà Nẵng',
            4 => 'Cần Thơ',
        ];

        $districts = [
            1 => 'Quận 1', 2 => 'Quận 2', 3 => 'Quận 3', 4 => 'Quận 4', 5 => 'Quận 5',
            6 => 'Quận 6', 7 => 'Quận 7', 8 => 'Quận 8', 9 => 'Quận 9', 10 => 'Quận 10',
            11 => 'Quận 11', 12 => 'Quận 12', 13 => 'Quận 13', 14 => 'Quận 14', 15 => 'Quận 15',
            16 => 'Quận 16', 17 => 'Quận 17', 18 => 'Quận 18', 19 => 'Quận 19', 20 => 'Quận 20'
        ];

        $names = [
            'John Doe', 'Jane Smith', 'Alice Johnson', 'Bob Brown', 'Charlie White', 
            'David Black', 'Eva Green', 'Frank Harris', 'Grace Taylor', 'Hank King', 
            'Isla White', 'Jack Blue', 'Karen Purple', 'Leo Gold', 'Mona Silver', 
            'Nathan Bronze', 'Olivia Grey', 'Paul Green', 'Quincy White', 'Rachel Brown'
        ];

        $data = [];
        $counter = 0;

        foreach ($cities as $city_id => $city_name) {
            foreach ($districts as $district_id => $district_name) {
                // Kiểm tra nếu $counter < count($names) trước khi truy cập mảng $names
                if ($counter < count($names)) {
                    $data[] = [
                        'city_id' => $city_id,
                        'name' => $names[$counter],
                        'gender' => ($counter % 2 == 0) ? 'Male' : 'Female', // Giới tính chẵn là Male, lẻ là Female
                        'date' => Carbon::now(),
                        'district_id' => $district_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                    $counter++;
                }
            }
        }

        // Chèn dữ liệu vào bảng users
        DB::table('user')->insert($data);  // Sử dụng phương thức insert của DB facade
    }
}
