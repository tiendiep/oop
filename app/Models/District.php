<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    protected $fillable = ['city_id', 'districtVn', 'districtKorean'];
    public function city()
    {
        return $this->belongsTo(Citys::class, 'city_id'); // 'city_id' là khóa ngoại trong bảng districts
    }
}




