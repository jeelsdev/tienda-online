<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Unlock;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function create()
    {
        return view('business.unlock-account');
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

        $validationEmail = User::where('email', $request->email)->exists();

        if($validationEmail){

            $user = User::where('email', $request->email)->get();

            if($user[0]->status_id == 3){
                Unlock::create([
                    'description'=>$request->description,
                    'user_id'=>$user[0]->id,
                    'status_id'=>2
                ]);

                return redirect()->to('/');
            }

            return redirect()->route('unlock.account', ['email'=>$request->email, 'description'=>$request->description])
                ->withErrors(['email'=>'Por favor ingrese un correo valido.']);
        }

        return redirect()->route('unlock.account', ['email'=>$request->email, 'description'=>$request->description])
            ->withErrors(['email'=>'Por favor, ingresa un correo valido.']);
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
