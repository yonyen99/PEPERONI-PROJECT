<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Pizza;
use Hash;
use Illuminate\Support\Facades\Input;

class PizzaController extends Controller
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

        if (Auth::attempt($user_data)) {

            return redirect('successlogin');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    function successlogin()
    {
        $pizzas = Pizza::all();
        return view('successlogin', compact('pizzas'));
    }



    //function for logout.
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    //funtion go to register form
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


        if ($request->input('role') == true) {

            $user = new \App\User;
            $user->email  = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->adress = $request->input('adress');
            $user->role = $request->input('role');
            $user->save();
            $user_data = array(
                'email'  => $request->get('email'),
                'password' => $request->get('password'),
                'adress' => $request->get('adress')
            );

            if (Auth::attempt($user_data)) {

                return redirect('successlogin');
            } else {
                return back()->with('error', 'Wrong Login Details');
            }
        } else {

            $user = new \App\User;
            $user->email  = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->adress = $request->input('adress');
            $user->role = false;
            $user->save();
            $user_data = array(
                'email'  => $request->get('email'),
                'password' => $request->get('password'),
                'adress' => $request->get('adress')
            );

            if (Auth::attempt($user_data)) {

                return redirect('successlogin');
            } else {
                return back()->with('error', 'Wrong Login Details');
            }
        }
    }



    //create pizza
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
    }

    //update pizza 
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
    public function deletePizza($id)
    {
        $pizza = Pizza::find($id);
        $pizza->delete();
        return redirect('successlogin');
    }
}
