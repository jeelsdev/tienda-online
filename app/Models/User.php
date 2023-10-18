<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surnames',
        'birthday',
        'phone',
        'phone',
        'address_id',
        'state_id',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date:Y-m-d',
    ];


    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function unlocks(){
        return $this->hasMany(Unlock::class);
    }

    public function store(){
        return $this->hasOne(Store::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
