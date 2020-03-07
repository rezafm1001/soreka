<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Gate::allows('see_roles')) {
            $roles = Role::get();
            return view('role.list', compact('roles'));
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
        if(Gate::allows('create_role')) {
            $permissions = Permission::get();
            return view('role.create', compact('permissions'));
        }else{
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
        if(Gate::allows('create_role')) {

            $role=Role::create([
            'name'=>$request['name'],
        ]);
        $role->permissions()->sync($request->input('permission'));
        return redirect()->back();
        }else{
            echo '<h1>'.'دسترسی غیر مجاز'.'</h1>';

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        if(Gate::allows('delete_role')) {

            $role->delete();
        return redirect()->back();
    }else{
echo '<h1>'.'دسترسی غیر مجاز'.'</h1>';

}
    }
}
