<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Permission::create([
            'name'=>'delete_user',
        ]);
        \App\Permission::create([
            'name'=>'update_user',
        ]);
        \App\Permission::create([
            'name'=>'see_users',
        ]);
        \App\Permission::create([
            'name'=>'create_user',
        ]);
        \App\Permission::create([
            'name'=>'see_all_offices',
        ]);
        \App\Permission::create([
            'name'=>'delete_role',
        ]);
        \App\Permission::create([
            'name'=>'create_role',
        ]);
        \App\Permission::create([
            'name'=>'see_roles',
        ]);


       $role= \App\Role::create([
            'name'=>'admin'
        ]);
        $role->permissions()->sync([1,2,3,4,5,6,7,8]);
    }
}
