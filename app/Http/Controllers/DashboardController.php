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
        return Transaction::where('store_id', auth()->user()->store->id)
            ->where('status_id', 1)
            ->where('created_at', '>', now()->subMonth())
            ->count();
    }

    public function salesOfTheYear()
    {
        return Transaction::where('store_id', auth()->user()->store->id)
            ->where('status_id', 1)
            ->where('created_at', '>', now()->subYear())
            ->count();
    }

    public function numberOfClients()
    {
        $clients =  Transaction::where('store_id', auth()->user()->store->id)
            ->select('user_id')
            ->distinct()
            ->get();

        return count($clients);
    }

    public function numberOfProducts()
    {
        $products =  Transaction::where('store_id', auth()->user()->store->id)
            ->where('status_id', 1)
            ->select('product_id')
            ->distinct()
            ->get();

        return count($products);
    }

    public function salesForMonth()
    {
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
