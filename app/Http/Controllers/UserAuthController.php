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


    public function login(Request $request){

        $validator = Validator($request->all(),[
            'email' => 'required|string|email',
            'password' => 'required|string|min:3',
            'remember' => 'boolean',
            'guard' => 'required|string|in:admin',
          ]
          ,[
              'email.required' => 'Please, Enter your email',
              'email.email' => 'your Email not correct',
              'password.required' => 'Please, Enter your password',
              'guard.in' => 'verify from true url login account'
          ]
      );

          $credenials = [
             'email'=>$request->get('email'),
             'password'=>$request->get('password'),

          ];
          if(!$validator->fails()){
            // dd();
            if (Auth::guard($request->get('guard'))->attempt($credenials, $request->get('remember_me'))) {

                  return response()->json(['message'=> 'Logged in successfully'],200);
          }
          else{
              return response()->json(['message'=> 'Error email or password , login failed'], 400);
          }
      }
          else{
              return response()->json(['message'=> $validator->getMessageBag()->first()],400);
          }
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