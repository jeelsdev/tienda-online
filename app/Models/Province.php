<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $chunk = 2000;

    protected $fillable = [
        'id', 
        'name', 
        'department_id', 
    ];

    public $timestamps = false;

    public function district(){
        return $this->hasMany(District::class);
    }

}
