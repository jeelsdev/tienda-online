<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $products = Product::with('category')->where('store_id', $user->store->id)
            ->when(request('search'), function($query){
                $query->where('name', 'LIKE', '%'.request('search').'%');
            })->when(request('status'), function($query){
                $query->where('status_id', request('status'));
            })->when(request('category'), function($query){
                $query->where('category_id', request('category'));
            })->orderBy('id', 'DESC')
            ->paginate(10);
        $categories = Category::all();
        $statuses = Status::whereIn('id', [1,2])->get();
        return view('staff.product.index', compact(['products', 'categories', 'statuses']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('staff.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $image =  $request->file('image')->store('/public/images/products');
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'amount'=>$request->amount,
            'image'=>Storage::url($image),
            'description'=>$request->description,
            'status_id'=>$request->status,
            'store_id'=>auth()->user()->store->id,
            'category_id'=>$request->category,
        ]);

        Session::flash('message', 'Producto creado exitosamente.');

        return redirect()->route('staff.products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $category = Category::find($product->category_id);
        return view('staff.product.show', compact(['product', 'category']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('staff.product.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if($request->image){
            $image =  $request->file('image')->store('/public/images/products');
            $product->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'amount'=>$request->amount,
                'image'=>Storage::url($image),
                'description'=>$request->description,
                'status_id'=>$request->status,
                'store_id'=>auth()->user()->store->id,
                'category_id'=>$request->category,
            ]);
    
        }else {
            $product->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'amount'=>$request->amount,
                // 'image'=>Storage::url($image),
                'description'=>$request->description,
                'status_id'=>$request->status,
                'store_id'=>auth()->user()->store->id,
                'category_id'=>$request->category,
            ]);
        }

        Session::flash('message', 'Producto actualizado correctamente');
        return redirect()->route('staff.products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
