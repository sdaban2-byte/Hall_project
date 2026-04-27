<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
   
   
    public function showLogin($guard) {
        return response()->view('cms.auth.login', compact('guard'));
    }

  
    public function login(Request $request) {
    $guard = $request->input('guard');
    $credentials = $request->only('email', 'password');

    if (Auth::guard($guard)->attempt($credentials)) {
     
        $redirectUrl = match($guard) {
            'admin'      => '/cms/admin',
            'hall_owner' => '/cms/admin', 
            'client'     => '/cms/admin',              
            
        };

        return response()->json([
            'message' => 'Login successful',
            'redirect_url' => $redirectUrl 
        ], 200);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
}
    

    public function logout(Request $request) 
{
    $guard = '';

    if (auth('admin')->check()) {
        $guard = 'admin';
    } elseif (auth('client')->check()) {
        $guard = 'client';
    } elseif (auth('hall_owner')->check()) {
        $guard = 'hall_owner';
    }

    if ($guard) {
        Auth::guard($guard)->logout();
       
    }
      $request->session()->invalidate();
 return redirect()->route('view.login', $guard);

}

    public function changepassword() {
      
    }

   
    public function reset(Request $request) {
      
    }

   
    public function editProfile() {
        
    }

    public function updateProfile(Request $request, $id) {
       
    }
}