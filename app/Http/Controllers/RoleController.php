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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if(Gate::allows('see_roles')) {
            if($request->has('text')) {
                $roles = Role::orderBy('id','DESC')->where($request['field'],'LIKE','%'.$request['text'].'%')->paginate(30);

            }else{
                $roles = Role::orderBy('id','DESC')->paginate(30);

            }
            return view('role.list', compact('roles'));
        }else {
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
        if(Gate::allows('create_role')) {
            $permissions = Permission::get();
            return view('role.create', compact('permissions'));
        }else{
            return abort(401);

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
        $this->validate(request(), [
            'name' => 'required|string|min:1|max:30',
            'permission' => 'required',
        ],[
            'permission.required'=>'وارد کردن حداقل یک دسترسی الزامی است'
        ]);
        if(Gate::allows('create_role')) {

            $role=Role::create([
            'name'=>$request['name'],
        ]);
        $role->permissions()->sync($request->input('permission'));
        return redirect()->back();
        }else{
            return abort(401);

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
        if($role->id!=1){
        if(Gate::allows('delete_role')) {

            $role->delete();
        return redirect()->back();
    }else{
            return abort(401);

}}else{
            return abort(401);

        }
    }
}
