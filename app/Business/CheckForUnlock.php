<?php

namespace App\Business;

use App\Models\Unlock;
use App\Models\User;

class CheckForUnlock
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function validateEmail(){
        return User::where('email', $this->request->email)->exists();
    }


    public function validateUser():bool {

        $user = User::where('email', $this->request->email)->get();

        $unlock = Unlock::where('user_id', $user[0]->id)
            ->where('status_id', 2)
            ->count();

        if($user[0]->status_id == 3 && $unlock !== 1){
            Unlock::create([
                'description'=>$this->request->description,
                'user_id'=>$user[0]->id,
                'status_id'=>2
            ]);
            return true;
        }
        return false;
    }
    
}

