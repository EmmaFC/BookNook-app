<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'superadmin']);
        $role2 = Role::create(['name' => 'admin VIP']);
        $role3 = Role::create(['name' => 'admin']);
        $role4 = Role::create(['name' => 'user']);
        
            $role2->givePermissionTo('edit contact links');
            $role2->givePermissionTo('delete contact links');
            $role2->givePermissionTo('create contact links');
            $role2->givePermissionTo('list contact links');
            $role2->givePermissionTo('show contact links');
            $role2->givePermissionTo('login as admin');
            $role2->givePermissionTo('register admins');
            $role2->givePermissionTo('edit profile');
            $role2->givePermissionTo('edit admins');
            $role2->givePermissionTo('delete admins');
            $role2->givePermissionTo('create admins');
            $role2->givePermissionTo('list admins');
            $role2->givePermissionTo('show admins');
            $role2->givePermissionTo('edit users');
            $role2->givePermissionTo('delete users');
            $role2->givePermissionTo('create users');
            $role2->givePermissionTo('list users');
            $role2->givePermissionTo('show users');
            $role2->givePermissionTo('edit books');
            $role2->givePermissionTo('delete books');
            $role2->givePermissionTo('create books');
            $role2->givePermissionTo('list books');
            $role2->givePermissionTo('show books');
            $role2->givePermissionTo('login as admin');

            $role3->givePermissionTo('edit profile');
            $role3->givePermissionTo('list admins');
            $role3->givePermissionTo('list users');
            $role3->givePermissionTo('filter search');
            $role3->givePermissionTo('edit books');
            $role3->givePermissionTo('delete books');
            $role3->givePermissionTo('create books');
            $role3->givePermissionTo('list books');
            $role3->givePermissionTo('show books');

            $role4->givePermissionTo('register users');
            $role4->givePermissionTo('login as user');
            $role4->givePermissionTo('edit profile');
            $role4->givePermissionTo('list books');
            $role4->givePermissionTo('show books');
            $role4->givePermissionTo('filter search');
            $role4->givePermissionTo('mark favorites');
            $role4->givePermissionTo('mark ranking');

    }
}
