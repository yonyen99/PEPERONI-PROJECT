<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Pizza;
class pizaControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $user = User::find(1);
        // $pizza = new \App\Pizza;
        //  $pizza->name = $request->get('name');
        //  $pizza->ingredients = $request->get('ingredients');
        //  $pizza->prize = $request->get('prize');
        //  $pizza->user_id = $user->id;
        //  $pizza->save();
        //  return redirect('successlogin');
        // // return view(successlogin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the form login.
     *
     * @return \Illuminate\Http\Response
     */

   
    /**
     * Display a listing of the form login.
     *
     * @return \Illuminate\Http\Response
     */

    public function goRegisterForm()
    {
        return view('auth.register');
    }

    



}
