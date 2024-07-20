<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Spatie\FlareClient\Http\Response;

class BalanceController extends Controller
{
    public function deposit(): mixed
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

        return Inertia::render('Deposit', [
            'user' => $user,
            'totalGained' => $totalGained,
            'totalWasted' => $totalWasted,
        ]);
    }

    public function withdraw(): mixed
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

        return Inertia::render('Withdraw', [
            'user' => $user,
            'totalGained' => $totalGained,
            'totalWasted' => $totalWasted,
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $user = Auth::user();

        Transaction::create([
            'amount' => $request->amount,
            'transaction_type' => $request->transaction_type,
            'user_id' => $user->id,
        ]);

        if($request->transaction_type == 'gain')
        {
            $user->balance += $request->amount;
        }else {
            $user->balance -= $request->amount;
        }
        $user->save();

        return response()->json(['success' => true, 'balance' => $user->balance]);
    }

}
