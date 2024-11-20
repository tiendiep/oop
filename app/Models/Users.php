<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user'; 
    protected $fillable = ['city_id', 'name', 'gender', 'date', 'district_id'];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id'); // 'cityId' là khóa ngoại trong bảng users
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id'); // 'city_id' là khóa ngoại trong bảng districts
    }
}






