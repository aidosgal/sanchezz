<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home(): mixed
    {
        $user = Auth::user();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $totalGained = DB::table('transactions')
            ->where('user_id', $user->id)
            ->where('transaction_type', 'gain')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        $totalWasted = DB::table('transactions')
            ->where('user_id', $user->id)
            ->where('transaction_type', 'waste')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        return Inertia::render('Dashboard', [
            'user' => $user,
            'totalGained' => $totalGained,
            'totalWasted' => $totalWasted,
        ]);
    }
}

