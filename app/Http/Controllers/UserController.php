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
        if (Gate::allows('see_users')) {
            $users = User::orderBy('id','DESC')->paginate(30);
            return view('user.list', compact('users'));
        } else {
            return abort(401);
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
        if (Gate::allows('create_user')) {
            $roles = Role::get();
            return view('user.create', compact('roles'));
        } else {
            return abort(401);

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(), [
            'username' => 'required|string|min:4|max:30|unique:App\User,username',
            'password' => 'required|string|min:4|max:30',
        ],[
            'username.unique'=>'این نام کاربری قبلا به ثبت رسیده است...'
        ]);
        if (Gate::allows('create_user')) {
            $user = User::create([
                'username' => $request['username'],
                'password' => Hash::make($request['password']),
                'creator_id' => auth()->user()->id,
            ]);
            $user->roles()->sync($request->input('role'));
            return redirect(route('user.index'));
        } else {
            return abort(401);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if ($user->id == 1 && auth()->user()->id!=1) {
            return abort(401);}
        else{
            if (Gate::allows('update_user')||$user->id==auth()->user()->id) {
                $roles = Role::get();
                return view('user.edit', compact('user', 'roles'));
            } else {
                return abort(401);
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $this->validate(request(), [
            'username' => 'required|string|min:4|max:30',
            'password' => 'required|string|min:4|max:30',

        ],[
            'username.unique'=>'این نام کاربری قبلا به ثبت رسیده است...'
        ]);

        if ($user->id == 1 && auth()->user()->id!=1) {
            return abort(401);}
        else{
            if (Gate::allows('update_user') || $user->id==auth()->user()->id) {

                $user->update([
                    'username' => $request['username'],
                    'password' => Hash::make($request['password']),
                ]);
                $user->roles()->sync($request->input('role'));
                return redirect()->back();
            } else {
                return abort(401);

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if ($user->id != 1) {
            if (Gate::allows('delete_user')) {
                $user->delete();
                return redirect()->back();
            } else {
                return abort(401);

            }
        } else {
            return abort(401);

        }
    }

}
