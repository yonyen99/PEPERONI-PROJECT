<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Pizza;
use Hash;
use Auth;
class userController extends Controller
{
    public function store(Request $request)
    {
    // //    print_r($request->input());
    //     $result=DB::insert("insert into users(email,password,adress) values (?,?,?)",[$request->input('email'),$request->input('password',$request->input('adress'))]);
    //     echo $result;
                // $user= Input::all();

                // $user = new \App\User;
                // $user->email  = $request->input('email');
                // $user->password = Hash::make($request->input('password'));
                // $user->adress = $request->input('adress');
                // if($user(checkdate))
                // $user->role_id = 0;
                // $user->save();
                // return view('successlogin');
                // return view('welcome');

                // $pizzas = Pizza::all();
                // return view('successlogin',compact('pizzas'));


                
                // return redirect()->route('successlogin');


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
