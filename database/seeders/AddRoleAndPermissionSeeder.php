<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class AddRoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'users.index']);
        Permission::create(['name'=>'users.edit']);
        Permission::create(['name'=>'users.show']);
        Permission::create(['name'=>'users.create']);
        Permission::create(['name'=>'users.destroy']);

        $roleAdmin = Role::create(['name'=>'Administrator']);

        $roleAdmin->givePermissionTo([
            'users.index',
            'users.edit',
            'users.show',
            'users.create',
            'users.destroy',
        ]);
        $user = User::create([
            'name'=>    'admin',
            'username'=>    'admin',
            'email' =>  'admin@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);
        $user->assignRole('Administrator');
    }
}

