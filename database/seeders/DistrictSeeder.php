<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\City;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        // Lấy tất cả các thành phố
        $cities = City::all();

        foreach ($cities as $city) {
            // Tạo 5 quận cho mỗi thành phố
            for ($i = 1; $i <= 5; $i++) {
                District::create([
                    'city_id' => $city->id,
                    'districtVn' => "Quận $i - " . $city->citynameVn,
                    'districtKorean' => "구 $i - " . $city->citynameKorea,
                ]);
            }
        }
    }
}
