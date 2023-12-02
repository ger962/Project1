<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        // Handle the login logic here
        $email = $request->input('name');
        $password = $request->input('psw');
    
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication was successful
            return response()->json(['success' => true, 'redirect' => '/landing']);
        } else {
            return response()->json(['success' => false, 'error' => 'Invalid credentials']);
            // Authentication failed
            // Handle login failure here
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('/welcome'); // Redirect to the home page or any other desired page after logout
    }
}
