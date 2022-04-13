<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()[PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions
         Permission::create(['name' => 'edit company']);
         Permission::create(['name' => 'delete company']);
         Permission::create(['name' => 'create company']);
         Permission::create(['name' => 'list company']);
         Permission::create(['name' => 'show company']);
 
         Permission::create(['name' => 'edit contact links']);
         Permission::create(['name' => 'delete contact links']);
         Permission::create(['name' => 'create contact links']);
         Permission::create(['name' => 'list contact links']);
         Permission::create(['name' => 'show contact links']);
 
         Permission::create(['name' => 'edit roles']);
         Permission::create(['name' => 'delete roles']);
         Permission::create(['name' => 'create roles']);
         Permission::create(['name' => 'list roles']);
         Permission::create(['name' => 'show roles']);
 
         Permission::create(['name' => 'edit permissions']);
         Permission::create(['name' => 'delete permissions']);
         Permission::create(['name' => 'create permissions']);
         Permission::create(['name' => 'list permissions']);
         Permission::create(['name' => 'show permissions']);
 
         Permission::create(['name' => 'edit users']);
         Permission::create(['name' => 'delete users']);
         Permission::create(['name' => 'create users']);
         Permission::create(['name' => 'list users']);
         Permission::create(['name' => 'show users']);
 
         Permission::create(['name' => 'edit admins']);
         Permission::create(['name' => 'delete admins']);
         Permission::create(['name' => 'create admins']);
         Permission::create(['name' => 'list admins']);
         Permission::create(['name' => 'show admins']);
 
         Permission::create(['name' => 'edit books']);
         Permission::create(['name' => 'delete books']);
         Permission::create(['name' => 'create books']);
         Permission::create(['name' => 'list books']);
         Permission::create(['name' => 'show books']);
 
         Permission::create(['name' => 'edit categories']);
         Permission::create(['name' => 'delete categories']);
         Permission::create(['name' => 'create categories']);
         Permission::create(['name' => 'list categories']);
         Permission::create(['name' => 'show categories']);
 
         Permission::create(['name' => 'edit profile']);
         Permission::create(['name' => 'filter search']);
         Permission::create(['name' => 'mark favorites']);
         Permission::create(['name' => 'mark ranking']);
 
         Permission::create(['name' => 'login as user']);
         Permission::create(['name' => 'login as admin']);
         Permission::create(['name' => 'register users']);
         Permission::create(['name' => 'register admins']);
 
 
 
    }
}
