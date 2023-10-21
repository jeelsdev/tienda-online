<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Status;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;

class StoreController extends Controller
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
     * @param  \App\Http\Requests\StoreStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $statuses = Status::where('id', 1)
            ->orWhere('id', 2)
            ->get();
        return view('admin.show-store', compact(['store', 'statuses']));
    }

    public function showValidate(Store $store)
    {
        $user = User::find($store->user_id);
        $direction = Address::with(['department', 'province', 'district'])
            ->where('id', $user->address_id)
            ->get();
        $statuses = Status::where('id', 1)
            ->orWhere('id', 2)
            ->get();
        return view('admin.validate-store', compact(['store', 'user', 'direction', 'statuses']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {

        $statuses = Status::whereIn('id', [1, 2])->get();
        return view('admin.edit-store', compact(['store', 'statuses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreRequest  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update([
            'name'=>$request->name,
            'ruc'=>$request->ruc,
            'description'=>$request->description,
            'status_id'=>$request->status,
        ]);

        return redirect()->route('admin.stores');
    }

    public function updateStatus(Request $request, Store $store){
        $store->update([
            'status_id'=>$request->status,
        ]);
        return redirect()->route('admin.stores.news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }

    public function getAllNews(Request $request){

        $stores = Store::with('user')
            ->where('created_at','>', now()->subMonth())
            ->when(request('status'), function($query){
                $query->where('status_id', request('status'));
            })->when(request('search'), function($query){
                $query->where('name', 'LIKE', '%'.request('search').'%')
                ->orWhere('ruc', 'LIKE', '%'.request('search').'%');
            })->orderBy('created_at')
            ->paginate(10);

        return view('admin.new-stores', compact('stores'));
    }

    public function getAll()
    {
        $stores = Store::with('user')
            ->where('created_at','>', now()->subMonth())
            ->when(request('status'), function($query){
                $query->where('status_id', request('status'));
            })->when(request('search'), function($query){
                $query->where('name', 'LIKE', '%'.request('search').'%')
                ->orWhere('ruc', 'LIKE', '%'.request('search').'%');
            })->orderBy('status_id')
            ->paginate(10);
        return view('admin.all-stores', compact('stores'));
    }

}
