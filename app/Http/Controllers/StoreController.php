<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Status;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Notifications\StoreActivated;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::find(auth()->user()->store->id);

        if($store){
            return view('staff.store.index', compact('store'));
        }
        return redirect()->route('staff.store.create');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Store::find(auth()->user()->store->id)){
            return redirect()->route('staff.store');
        }
        return view('staff.store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {
        $logo = $request->file('logo')->store('/public/images/logos');

        Store::create([
            'name'=>$request->name,
            'ruc'=>$request->ruc,
            'description'=>$request->description,
            'user_id'=>auth()->user()->id,
            'status_id'=>2,
            'logo'=>Storage::url($logo),
        ]);

        Session::flash('message', 'Cuenta creada exitosamente');

        return redirect()->route('staff.store');
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

    public function editByStaff(Store $store){
        return view('staff.store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreRequest $request
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

        if($request->status == 1){
            User::find($store->user_id)->notify(new StoreActivated($store));
        }

        return redirect()->route('admin.stores.news');
    }

    public function updateByStaff(Request $request, Store $store){
        $request->validate([
            'name'=>'required|string|max:100',
            'ruc'=>'required|numeric|digits:11',
            'description'=>'required|string|max:255',
            'logo'=>'image|max:1024',
        ]);

        if($request->logo){
            $logo = $request->file('logo')->store('/public/images/logos');
            $store->update([
                'name'=>$request->name,
                'ruc'=>$request->ruc,
                'description'=>$request->description,
                'logo'=>Storage::url($logo),
            ]);
        }else {
            $store->update([
                'name'=>$request->name,
                'ruc'=>$request->ruc,
                'description'=>$request->description,
            ]);
        }

        Session::flash('message', 'Se actulizo correctamente.');

        return redirect()->route('staff.store');
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
