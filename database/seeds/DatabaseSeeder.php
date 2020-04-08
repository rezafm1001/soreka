<?php

use App\Office;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Role::truncate();
        Office::truncate();
        User::truncate();

        $this->call(PermissionTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         Schema::enableForeignKeyConstraints();
    }
}
