<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
