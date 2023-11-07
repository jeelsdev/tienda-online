<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ruc',
        'description',
        'status_id',
        'user_id',
        'logo'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->hasMany(Status::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function scopeName($query, $name){
        if($name){
            return $query->where('name', 'LIKE', "%$name%")
                ->orWhere('ruc', 'LIKE', "%$name%");
        }
    }

    public function scopeRuc($query, $ruc){
        if($ruc){
            return $query->where('ruc', 'LIKE', "%$ruc%");
        }
    }
}
