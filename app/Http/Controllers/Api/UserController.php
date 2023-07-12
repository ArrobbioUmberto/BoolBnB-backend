<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        // $user_id = Auth::id();
        $user_id = 32;

        // $user_id = Auth::id();
        // dd(session()->get('user_id'));

        $user = User::where('id', $user_id)->first();

        return response()->json([
            'success' => true,
            'results' => $user,
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticazione riuscita
            return redirect()->intended('/');
        }

        // Autenticazione fallita
        return back()->withErrors([
            'email' => 'Credenziali non valide.',
        ]);
    }
}
