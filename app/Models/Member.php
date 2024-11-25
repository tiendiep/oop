<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    
    protected $table = 'members';


    protected $fillable = ['name', 'gender', 'date'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
