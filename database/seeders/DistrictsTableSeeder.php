<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            ['city_id' => 1, 'districtVn' => 'Ba Đình', 'districtKr' => '바딩'],
            ['city_id' => 1, 'districtVn' => 'Hoàn Kiếm', 'districtKr' => '호안끼엠'],
            ['city_id' => 2, 'districtVn' => 'Quận 1', 'districtKr' => '1구'],
            ['city_id' => 2, 'districtVn' => 'Quận 2', 'districtKr' => '2구'],
            ['city_id' => 3, 'districtVn' => 'Hải Châu', 'districtKr' => '하이추'],
            ['city_id' => 3, 'districtVn' => 'Sơn Trà', 'districtKr' => '손짜'],
            ['city_id' => 4, 'districtVn' => 'Ngũ Hành Sơn', 'districtKr' => '오행산'],
            ['city_id' => 4, 'districtVn' => 'Liên Chiểu', 'districtKr' => '리엔치어'],
            ['city_id' => 5, 'districtVn' => 'Cẩm Lệ', 'districtKr' => '캄레'],

            // Cần Thơ
            ['city_id' => 5, 'districtVn' => 'Ninh Kiều', 'districtKr' => '닌키우'],
            ['city_id' => 9, 'districtVn' => 'Cái Răng', 'districtKr' => '까이랑'],
            ['city_id' => 6, 'districtVn' => 'Phong Điền', 'districtKr' => '퐁디엔'],
            ['city_id' => 7, 'districtVn' => 'Thốt Nốt', 'districtKr' => '토트노트'],
            ['city_id' => 8, 'districtVn' => 'Vĩnh Thạnh', 'districtKr' => '빈탄'],
            ['city_id' => 10, 'districtVn' => 'Thốt Nốt', 'districtKr' => '토트노트'],
            ['city_id' => 8, 'districtVn' => 'Vĩnh Jung', 'districtKr' => '빈탄'],
            ['city_id' => 7, 'districtVn' => ' duong Thốt Nốt', 'districtKr' => '토트노트'],
            ['city_id' => 9, 'districtVn' => 'Vĩnh  xuan Thạnh', 'districtKr' => '빈탄'],  ['city_id' => 7, 'districtVn' => 'Thốt Nốt', 'districtKr' => '토트노트'],
            ['city_id' => 10, 'districtVn' => ' Gi cx oke', 'districtKr' => '빈탄'],
        ];
        foreach ($districts as $district) {
            District::create($district);
        }
    }
}
