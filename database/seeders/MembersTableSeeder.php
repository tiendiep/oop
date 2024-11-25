<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = [
            ['name' => 'John Doe', 'gender' => 'Male', 'date' => '1990-05-15'],
            ['name' => 'Jane Smith', 'gender' => 'Female', 'date' => '1992-08-25'],
            ['name' => 'Alice Johnson', 'gender' => 'Female', 'date' => '1988-03-10'],
            ['name' => 'Bob Brown', 'gender' => 'Male', 'date' => '1985-11-05'],
            ['name' => 'Charlie Davis', 'gender' => 'Male', 'date' => '1989-06-12'],
            ['name' => 'Diana Lee', 'gender' => 'Female', 'date' => '1993-07-23'],
            ['name' => 'Ethan White', 'gender' => 'Male', 'date' => '1991-02-02'],
            ['name' => 'Fiona Harris', 'gender' => 'Female', 'date' => '1994-10-11'],
            ['name' => 'George Clark', 'gender' => 'Male', 'date' => '1987-09-14'],
            ['name' => 'Hannah Scott', 'gender' => 'Female', 'date' => '1995-01-29'],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}
