<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Sonia',
            'email' => 'superadmin@contact.com',
            'password' => '$2y$10$QMs.f6PPq795yQm3bJc9FuU7lzVWfj./XFFPuI7K3/vJlGV44NIPC',
            /* 'description' => 'Hola, soy la superadmin',
            'admin_key' => '$2y$10$QMs.f6PPq795yQm3bJc9FuU7lzVWfj./XFFPuI7K3/vJlGV44NIPC', */
        ])->assignRole('superadmin');

        $user = User::factory()->create([
            'name' => 'Matthew',
            'email' => 'adminvip@contact.com',
            'password' => '$2y$10$QMs.f6PPq795yQm3bJc9FuU7lzVWfj./XFFPuI7K3/vJlGV44NIPC',
            /* 'description' => 'Hola, soy un admin VIP',
            'admin_key' => '$2y$10$QMs.f6PPq795yQm3bJc9FuU7lzVWfj./XFFPuI7K3/vJlGV44NIPC', */
        ])->assignRole('admin VIP');

        $user = User::factory()->create([
            'name' => 'Mila',
            'email' => 'admin@contact.com',
            'password' => '$2y$10$QMs.f6PPq795yQm3bJc9FuU7lzVWfj./XFFPuI7K3/vJlGV44NIPC',
            /* 'description' => 'Hola, soy una admin',
            'admin_key' => '$2y$10$QMs.f6PPq795yQm3bJc9FuU7lzVWfj./XFFPuI7K3/vJlGV44NIPC', */
        ])->assignRole('admin');

        $user = User::factory()->create([
            'name' => 'Thomas',
            'email' => 'user@mail.com',
            'password' => '$2y$10$QMs.f6PPq795yQm3bJc9FuU7lzVWfj./XFFPuI7K3/vJlGV44NIPC',
           /*  'description' => 'Hola, soy un usuario',
            'admin_key' => '$2y$10$QMs.f6PPq795yQm3bJc9FuU7lzVWfj./XFFPuI7K3/vJlGV44NIPC', */
        ])->assignRole('user');
    }
}
