<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Pizza;
use Hash;
// use Request;
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

    
    //check login
    function checkregister(Request $request)
    {
      

    if(Request::get('mycheckbox')){
      DB::connection('mysql_external');
      $request->validate([
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
        'adress' => ['required', 'string', 'max:255'],
    ]);
    $user = new \App\User;
    $user->email  = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->adress = $request->input('adress');
    // $user->role_id = $request->input('manage');
    $user->role_id = 1;
    $pizzas = Pizza::all();
    $user->save();
    return view('successlogin',compact('pizzas'));
    
    }else{

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

    public function createPizza(Request $request)
    {   
        $user = User::find(1);
        $pizza = new Pizza;
         $pizza->name = $request->get('name');
         $pizza->ingredients = $request->get('ingredients');
         $pizza->prize = $request->get('prize');
         $pizza->user_id = $user->id;
         $pizza->save();
         return redirect('successlogin');
        // return view(successlogin');
    }


    public function updatePizza($id, Request $request)
   {

        $pizza = Pizza::find($id);
        $pizza->name = $request->get('name');
        $pizza->ingredients = $request->get('ingredients');
        $pizza->prize = $request->get('prize');
        $pizza->save();
        return redirect('successlogin');
   }

    
    //delet student
    public function deletePizza($id){
      $pizza = Pizza::find($id);
      $pizza ->delete();
      return redirect('successlogin');
  }


}