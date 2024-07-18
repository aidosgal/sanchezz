<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home(): mixed
    {
        $user = Auth::user();

        return Inertia::render('Dashboard', [
           'user' => $user,
        ]);
    }
}
