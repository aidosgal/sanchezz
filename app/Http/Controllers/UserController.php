<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    protected function __invoke(): mixed
    {
        return Inertia::render('Home');
    }
}
