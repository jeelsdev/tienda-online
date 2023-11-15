<?php

namespace App\Http\Controllers;

use App\Business\CheckForUnlock;
use App\Models\Status;
use App\Models\Unlock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Stmt\TryCatch;

class UnlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unlocks = Unlock::with('user')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('admin.unlock', compact('unlocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($email)
    {
        try {
            $email = Crypt::decryptString($email);
        } catch (\Throwable $th) {
            $email = null;
        }
        return view('business.unlock-account',compact('email'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|string|email',
            'description'=>'required|string|max:100'
        ]);

        $checkForUnlock = new CheckForUnlock($request);

        if($checkForUnlock->validateEmail()){

            if($checkForUnlock->validateUser()){
                return redirect()->to('/');
            }
            return back()->withErrors(['email'=>'El correo proporcionado, esta activo o ya tiene un seguimiento a cargo.']);
        }

        return back()->withErrors(['email'=>'Por favor, ingrese un correo valido.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unlock = Unlock::with('user')
            ->where('id', $id)
            ->get();
        return view('admin.unlock-validate', compact(['unlock']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'status'=>'required'
        ]);

        if($request->status == 1){
            $user->update([
                'status_id'=>2,
            ]);

            $unlock = Unlock::find($request->unlock);
            
            $unlock->update([
                'status_id'=>1,
            ]);

        }

        return redirect()->route('request.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
