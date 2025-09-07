<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users[] = User::firstOrCreate(
            ['email' => 'admin@blog.com'],
            [
                'name' => 'Muhammad Norsyahrin Seth',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        $users[] = User::firstOrCreate(
            ['email' => 'ahmad@blog.com'],
            [
                'name' => 'Ahmad Rahman',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        $users[] = User::firstOrCreate(
            ['email' => 'siti@blog.com'],
            [
                'name' => 'Siti Nurhaliza',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        $users[] = User::firstOrCreate(
            ['email' => 'david@blog.com'],
            [
                'name' => 'David Kumar',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // Assign roles to users
        if (count($users) >= 4) {
            // Assign admin role to first user
            $users[0]->assignRole('admin');

            // Assign editor role to second user
            $users[1]->assignRole('editor');

            // Assign user role to third user
            $users[2]->assignRole('user');

            // Assign multiple roles to fourth user (editor and user)
            $users[3]->assignRole(['editor', 'user']);
        }
    }
}
