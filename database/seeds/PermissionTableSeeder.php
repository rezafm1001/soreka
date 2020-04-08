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
            'title'=>'حذف کاربر',
        ]);
        \App\Permission::create([
            'name'=>'update_user',
            'title'=>'آپدیت کاربر',
        ]);
        \App\Permission::create([
            'name'=>'see_users',
            'title'=>'دیدن کاربران',
        ]);
        \App\Permission::create([
            'name'=>'create_user',
            'title'=>'ایجاد کاربر',
        ]);
        \App\Permission::create([
            'name'=>'see_all_offices',
            'title'=>'دیدن تمام شرکت ها',
        ]);
        \App\Permission::create([
            'name'=>'delete_office',
            'title'=>'حذف شرکت',
        ]);
        \App\Permission::create([
            'name'=>'delete_role',
            'title'=>'حذف نقش',
        ]);
        \App\Permission::create([
            'name'=>'create_role',
            'title'=>'ایجاد نقش',

        ]);
        \App\Permission::create([
            'name'=>'see_roles',
            'title'=>'دیدن نقش ها',

        ]);


       $role= \App\Role::create([
            'name'=>'ادمین'
        ]);
        $role->permissions()->sync([1,2,3,4,5,6,7,8,9]);
    }
}
