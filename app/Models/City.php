<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;


    protected $table = 'cities';

    
    protected $fillable = ['citynameVn', 'citynameKr'];

   
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}

