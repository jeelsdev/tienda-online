<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'response',
        'user_id',
        'status_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
