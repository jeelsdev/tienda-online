<?php

namespace App\Http\Controllers;

use App\Mail\UserBlockedMailable;
use App\Models\User;
use App\Models\Status;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Notifications\UserBlocked;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('client.show-profile');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('client.edit-profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:30',
            'surnames'=>'required|string|max:100',
            'phone'=>'required|numeric|digits:9',
            'birthday'=>'required|date',
            'profile'=>'image|max:1024'
        ]);

        $user = auth()->user();

        if($request->profile){
            $image =  $request->file('profile')->store('/public/images/profiles');
            $user->update([
                'name'=>$request->name,
                'surnames'=>$request->surnames,
                'phone'=>$request->phone,
                'birthday'=>$request->birthday,
                'profile'=>Storage::url($image)
            ]);
        }else{
            $user->update([
                'name'=>$request->name,
                'surnames'=>$request->surnames,
                'phone'=>$request->phone,
                'birthday'=>$request->birthday,
            ]);
        }

        Session::flash('message', 'Se actualizo correctamente.');
        return redirect()->route('client.profile.edit');
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

    public function getAll(){
        $clients = User::role('client')
            ->when(request('search'), function($query){
                $query->where('name', 'LIKE', "%".request('search')."%")
                    ->orWhere('surnames', 'LIKE', "%".request('search')."%");
            })->when(request('status'), function($query){
                $query->where('status_id', request('status'));
            })->paginate(10);

        return view('admin.clients', compact('clients'));
    }

    public function showClient(User $client){
        $direction = Address::with(['department', 'province', 'district'])
            ->where('id', $client->address_id)
            ->get();
        $statuses = Status::whereIn('id', [1,2,3])->get();
        return view('admin.show-client', compact(['client','direction', 'statuses']));
    }

    public function updateStatus(Request $request, User $client){
        if ($request->status == 3) {
            $request->validate([
                'reason'=>'required|string|max:1000',
            ]);
            Mail::to(getenv('MAIL_FROM_ADDRESS'))
                ->send(new UserBlockedMailable($client, $request->reason));
        }

        $client->update([
            'status_id'=>$request->status,
        ]);
        Session::flash('message', 'Estado actualizo correctamente.');

        return redirect()->route('admin.clients');
    }
}
