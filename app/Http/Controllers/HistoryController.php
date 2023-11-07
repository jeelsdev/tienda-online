<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $transactions = Transaction::with(['product'])
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('client.history', compact('transactions'));
    }
}
