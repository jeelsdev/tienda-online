<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Address;
use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use App\Models\Status;
use App\Notifications\UserBlocked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $store = Store::where('user_id', $id)->get();
        $direction = Address::with(['department', 'province', 'district'])
            ->where('id', $user->address_id)
            ->get();
        $statuses = Status::all();
        return view('admin.show-staff', compact(['user', 'store', 'direction', 'statuses']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $store = Store::where('user_id', $id)->get();
        $direction = Address::with(['department', 'province', 'district'])
            ->where('id', $user->address_id)
            ->get();
        $departments = Department::all();
        $provinces = Province::all();
        $districts = District::all();
        $statuses = Status::all();
        return view('admin.edit-staff', compact(['user', 'store', 'direction', 'statuses', 'departments', 'provinces', 'districts']));
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
            'name'=>'required|string|max:30',
            'surnames'=>'required|string|max:30',
            'phone'=>'required',
            'direction'=>'required',
        ]);

        if($request->status == 3 && $request->status != $user->status_id){
            $request->validate([
                'reason'=>'required|string|min:5',
            ]);

            $user->notify(new UserBlocked($user, $request->reason));
        }

        $address = Address::find($user->address_id);
        $address->update([
            'direction'=>$request->direction,
            'department_id'=>$request->department,
            'province_id'=>$request->province,
            'district_id'=>$request->district,
        ]);
        $user->update([
            'name'=>$request->name,
            'surnames'=>$request->surnames,
            'phone'=>$request->phone,
            'status_id' =>$request->status
        ]);

        return redirect()->route('admin.staffs');
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
        $staffs = User::role('staff')
            ->when(request('search'), function($query){
                $query->where(DB::raw('CONCAT(name," ", surnames)'), 'LIKE', "%".request('search')."%");
            })->when(request('status'), function($query){
                $query->where('status_id', request('status'));
            })->orderBy('id', 'DESC')
            ->get();

        return view('admin.staffs', compact('staffs'));
    }
}
