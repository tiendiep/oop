<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
        // Thêm dữ liệu vào bảng city
        $cities = [
            ['citynameVn' => 'Hà Nội', 'citynameKorea' => '서울'],
            ['citynameVn' => 'TP Hồ Chí Minh', 'citynameKorea' => '호치민'],
            ['citynameVn' => 'Đà Nẵng', 'citynameKorea' => '다낭'],
            ['citynameVn' => 'Cần Thơ', 'citynameKorea' => 'Cantho']
        ];

        foreach ($cities as $cityData) {
            City::create($cityData); // Thêm thành phố vào bảng 'city'
        }
    }
}
