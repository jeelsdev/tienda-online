<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $chunk = 3000;

    protected $fillable = [
        'id', 
        'name', 
        'province_id', 
        'department_id', 
    ];


    public $timestamps = false;

}
