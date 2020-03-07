<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Gate::allows('see_users')){
            $users=User::get();
            return view('user.list',compact('users'));
        }else {
        echo '<h1>'.'دسترسی غیر مجاز'.'</h1>';
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Gate::allows('create_user')){
            $roles=Role::get();
            return view('user.create',compact('roles'));
        }else {
            echo '<h1>'.'دسترسی غیر مجاز'.'</h1>';

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Gate::allows('create_user')) {
            $user = User::create([
                'username' => $request['username'],
                'password' => Hash::make($request['password']),
            ]);
            $user->roles()->sync($request->input('role'));
            return redirect(route('user.index'));
        }else {
            echo '<h1>'.'دسترسی غیر مجاز'.'</h1>';

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if(Gate::allows('update_user')){
            $roles=Role::get();
            return view('user.edit',compact('user','roles'));
        }else{
            echo '<h1>'.'دسترسی غیر مجاز'.'</h1>';

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        if(Gate::allows('update_user')) {

            $user->update([
                'username' => $request['username'],
                'password' => Hash::make($request['password']),
            ]);
            $user->roles()->sync($request->input('role'));
            return redirect(route('user.index'));
        }else {
            echo '<h1>'.'دسترسی غیر مجاز'.'</h1>';

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if(Gate::allows('delete_user')) {
        $user->delete();
        return redirect()->back();}
        else {
            echo '<h1>'.'دسترسی غیر مجاز'.'</h1>';

        }
    }

}
