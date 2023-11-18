<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            return view('dashboard')->with([
                'salesOfTheMonth' => $this->salesOfTheMonth(),
                'salesOfTheYear' => $this->salesOfTheYear(),
                'numberOfClients' => $this->numberOfClients(),
                'numberOfProducts' => $this->numberOfProducts(),
            ]);
        }
        $store = Store::where('user_id', auth()->user()->id)->count();

        if($store == 1){
            return view('dashboard')->with([
                'salesOfTheMonth' => $this->salesOfTheMonth(),
                'salesOfTheYear' => $this->salesOfTheYear(),
                'numberOfClients' => $this->numberOfClients(),
                'numberOfProducts' => $this->numberOfProducts(),
            ]);
        }
        return view('dashboard')->with([
            'salesOfTheMonth' => 0,
            'salesOfTheYear' => 0,
            'numberOfClients' => 0,
            'numberOfProducts' => 0,
        ]);
    }

    public function salesOfTheMonth()
    {
        if(auth()->user()->hasRole('admin')){
            return Transaction::where('status_id', 1)
            ->where('created_at', '>', now()->subMonth())
            ->count();
        }
        return Transaction::where('store_id', auth()->user()->store->id)
            ->where('status_id', 1)
            ->where('created_at', '>', now()->subMonth())
            ->count();
    }

    public function salesOfTheYear()
    {
        if(auth()->user()->hasRole('admin')){
            return Transaction::where('status_id', 1)
            ->where('created_at', '>', now()->subYear())
            ->count();
        }
        return Transaction::where('store_id', auth()->user()->store->id)
            ->where('status_id', 1)
            ->where('created_at', '>', now()->subYear())
            ->count();
    }

    public function numberOfClients()
    {
        if(auth()->user()->hasRole('admin')){
            $clients =  Transaction::select('user_id')
            ->distinct()
            ->get();

            return count($clients);
        }
        $clients =  Transaction::where('store_id', auth()->user()->store->id)
            ->select('user_id')
            ->distinct()
            ->get();

        return count($clients);
    }

    public function numberOfProducts()
    {
        if(auth()->user()->hasRole('admin')){
            $products =  Transaction::where('status_id', 1)
            ->select('product_id')
            ->distinct()
            ->get();

            return count($products);
        }
        $products =  Transaction::where('store_id', auth()->user()->store->id)
            ->where('status_id', 1)
            ->select('product_id')
            ->distinct()
            ->get();

        return count($products);
    }

    public function salesForMonth()
    {

        if(auth()->user()->hasRole('admin')){
            $sales = Transaction::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(amount) as total_sales'))
            ->groupBy('month')
            ->get();
            return response($sales);
        }

        $store = Store::where('user_id', auth()->user()->id)->count();

        if($store == 1){
            $sales = Transaction::where('store_id', auth()->user()->store->id)
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(amount) as total_sales'))
                ->groupBy('month')
                ->get();
            return response($sales);
        }

        return response([0]);
    }

    public function soldProducts(){

        if(auth()->user()->hasRole('admin')){
            $sales = Transaction::with('product:id,name')
            ->where('status_id', 1)
            ->select(DB::raw('product_id'), DB::raw('SUM(amount) as total_sales'))
            ->groupBy('transactions.product_id')
            ->limit(5)
            ->get();
            return response($sales);
        }

        $store = Store::where('user_id', auth()->user()->id)->count();

        if($store == 1){
            $sales = Transaction::with('product:id,name')->where('store_id', auth()->user()->store->id)
            ->where('status_id', 1)
            ->select(DB::raw('product_id'), DB::raw('SUM(amount) as total_sales'))
            ->groupBy('transactions.product_id')
            ->limit(5)
            ->get();
            return response($sales);
        }

        return response([]);
    }
}
