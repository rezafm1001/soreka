<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $user= \App\User::create([
            'username'=>'admin',
            'password' => Hash::make('admin'),
           'creator_id'=>0,
        ]);
       $user->roles()->sync(1);
    }
}
