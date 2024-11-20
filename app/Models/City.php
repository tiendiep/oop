<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = ['citynameVn', 'citynameKorea'];
    public function users()
    {
        return $this->hasMany(Users::class, 'cityId'); // 'cityId' là khóa ngoại trong bảng users
    }
    public function districts()
    {
        return $this->hasMany(District::class, 'city_id'); // 'city_id' là khóa ngoại trong bảng districts
    }
    
}
