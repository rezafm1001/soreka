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
        \App\Permissions::create([
            'name'=>'delete_user',
        ]);
        \App\Permissions::create([
            'name'=>'update_user',
        ]);
        \App\Permissions::create([
            'name'=>'see_users',
        ]);
        \App\Permissions::create([
            'name'=>'see_all',
        ]);
        \App\Permissions::create([
            'name'=>'create_user',
        ]);

    }
}
