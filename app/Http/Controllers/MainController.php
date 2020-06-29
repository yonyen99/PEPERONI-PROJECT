<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Pizza;
use Hash;
class MainController extends Controller
{
    function index()
    {
      
     return view('auth.login');
    }
    //check login
    function checklogin(Request $request)
    {
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
     ]);

     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );
     
     if(Auth::attempt($user_data))
     {
       
      return redirect('successlogin');
     }
     else
     {
      return back()->with('error', 'Wrong Login Details');
     }

    }
    function successlogin()
    {
      $pizzas = Pizza::all();
      return view('successlogin',compact('pizzas'));
    }

  


      function logout()
    {
     Auth::logout();
     return redirect('/');
    }
    public function goRegisterForm()
    {
        return view('auth.register');
    }

    //check register view
    
    function checkregister(Request $request)
    {
      

  

      $request->validate([
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
        'adress' => ['required', 'string', 'max:255'],
    ]);
    $user = new \App\User;
    $user->email  = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->adress = $request->input('adress');
    $pizzas = Pizza::all();
    $user->save();
    return view('successlogin',compact('pizzas'));
    
    
    }

}
