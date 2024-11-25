<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;


    protected $table = 'addresses';

    protected $fillable = ['user_id', 'district_id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function user()
    {
        return $this->hasMany(Users::class);
    }
}
