<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // list all user
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Api pour stocker un user

        $request->validate([
        'lastname'=>'required',
        'firstname'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'password'=>'required',


        ]);

      /* $user =  new User();
       $user->lastname = $request->lastname;
       $user->firstname = $request->firstname;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->password = $request->password;*/

       $user = User::create([
          'lastname' => $request->lastname,
          'firstname' => $request->firstname,
          'email' => $request->email,
          'phone' => $request->phone,
          'password' => Hash::make($request->password)
       ]);


       return response()->json([
           'message'=>'enregistre avec succes',
            'succes' => 'true',
            'client'=> $user,

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //afficher un elts via id
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
