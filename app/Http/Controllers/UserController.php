<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function register(): mixed
    {
        return Inertia::render('Register');
    }

    public function confirm_page(): mixed
    {
        return Inertia::render('ConfirmEmail');
    }

    public function success_page(): mixed
    {
        return Inertia::render('SuccesfullConfirm');
    }

    public function create(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($request->password === $request->confirm_password) {
            $hashedPassword = Hash::make($request->password);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $hashedPassword,
                'avatar_url' => "default_avatar.png"
            ]);

            Auth::login($user);

            return redirect()->intended('/confirm');
        }

        return back()->withErrors(['confirm_password' => 'Passwords do not match.']);
    }

    public function profile(): mixed
    {
        $user = Auth::user();

        return Inertia::render('Profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'avatar_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        if ($request->hasFile('avatar_url')) {
            $avatarPath = $request->file('avatar_url')->store('images', 'public');
            $user->avatar_url = $avatarPath;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->intended('/');
    }
}

