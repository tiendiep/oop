<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        $cities = [
            ['citynameVn' => 'Hà Nội', 'citynameKr' => '서울'],
            ['citynameVn' => 'Hồ Chí Minh', 'citynameKr' => '호치민시'],
            ['citynameVn' => 'Đà Nẵng', 'citynameKr' => '대구'],
            ['citynameVn' => 'Cần Thơ', 'citynameKr' => '대전'],
            ['citynameVn' => 'Hải Phòng', 'citynameKr' => '광주'],
            ['citynameVn' => 'Nha Trang', 'citynameKr' => '춘천'],
            ['citynameVn' => 'Vũng Tàu', 'citynameKr' => '광주'],
            ['citynameVn' => 'Bắc Giang', 'citynameKr' => '인천'],
            ['citynameVn' => 'Quảng Ninh', 'citynameKr' => '울산'],
            ['citynameVn' => 'Nam Định', 'citynameKr' => '부산'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}

