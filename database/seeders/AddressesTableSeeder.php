<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = [
            ['user_id' => 1, 'district_id' => 1],
            ['user_id' => 1, 'district_id' => 2],
            ['user_id' => 2, 'district_id' => 1],
            ['user_id' => 3, 'district_id' => 3],
            ['user_id' => 1, 'district_id' => 1], // Ba Đình
            ['user_id' => 1, 'district_id' => 2], // Hoàn Kiếm

            // Jane Smith
            ['user_id' => 2, 'district_id' => 3], // Quận 1

            // Alice Johnson
            ['user_id' => 3, 'district_id' => 4], // Quận 2
            ['user_id' => 3, 'district_id' => 5], // Quận 3

            // Bob Brown
            ['user_id' => 4, 'district_id' => 1], // Ba Đình

            // Charlie Davis
            ['user_id' => 5, 'district_id' => 2], // Hoàn Kiếm

            // Diana Lee
            ['user_id' => 6, 'district_id' => 3], // Quận 1

            // Ethan White
            ['user_id' => 7, 'district_id' => 4], // Quận 2

            // Fiona Harris
            ['user_id' => 8, 'district_id' => 5], // Quận 3

            // George Clark
            ['user_id' => 9, 'district_id' => 6], // Quận 4

            // Hannah Scott
            ['user_id' => 10, 'district_id' => 7], 
        ];

        foreach ($addresses as $address) {
            Address::create($address);
        }
    }
}
