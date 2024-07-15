<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function __invoke(): mixed
    {
        return Inertia::render('Home');
    }

    public function login(): mixed
    {
        return Inertia::render('Login');
    }

    public function register(): mixed
    {
        return Inertia::render('Register');
    }
}
