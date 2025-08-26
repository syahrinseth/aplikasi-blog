<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first 4 users from the database dynamically
        $users = User::limit(4)->get();

        // Ensure we have at least some users, fallback to IDs if needed
        $user1 = $users->get(0)?->id ?? 1;
        $user2 = $users->get(1)?->id ?? 2;
        $user3 = $users->get(2)?->id ?? 3;
        $user4 = $users->get(3)?->id ?? 4;

        $posts = [
            [
                'slug' => 'asas-laravel-untuk-pemula',
                'title' => 'Asas Laravel untuk Pemula',
                'content' => 'Pengaturcaraan asas adalah langkah pertama dalam dunia teknologi. Dalam artikel ini, kita akan mempelajari asas-asas Laravel yang penting untuk pemula. Laravel adalah framework PHP yang powerful dan mudah dipelajari.',
                'user_id' => $user1,
                'image' => 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'category' => 'Pembangunan Web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'membangun-aplikasi-web-dengan-laravel',
                'title' => 'Membangun Aplikasi Web dengan Laravel',
                'content' => 'Laravel adalah framework PHP yang popular untuk membangunkan aplikasi web. Dalam tutorial ini, kita akan belajar cara membangun aplikasi web yang lengkap menggunakan Laravel dengan fitur-fitur modern.',
                'user_id' => $user2,
                'image' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'category' => 'Pembangunan Web',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'slug' => 'pengaturcaraan-berorientasikan-objek-dengan-php',
                'title' => 'Pengaturcaraan Berorientasikan Objek dengan PHP',
                'content' => 'Pengaturcaraan berorientasikan objek (OOP) adalah paradigma pengaturcaraan yang penting. Artikel ini akan mengajarkan konsep OOP dalam PHP dengan contoh-contoh praktis yang mudah difahami.',
                'user_id' => $user3,
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'category' => 'Pengaturcaraan',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'slug' => 'database-design-dan-optimisasi',
                'title' => 'Database Design dan Optimisasi',
                'content' => 'Database design yang baik adalah asas kepada aplikasi yang cekap. Dalam artikel ini, kita akan belajar prinsip-prinsip database design dan teknik optimisasi untuk meningkatkan prestasi aplikasi.',
                'user_id' => $user4,
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'category' => 'Database',
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
            ],
            [
                'slug' => 'api-development-dengan-laravel',
                'title' => 'API Development dengan Laravel',
                'content' => 'RESTful API adalah komponen penting dalam pembangunan aplikasi moden. Tutorial ini akan membimbing anda melalui proses pembangunan API yang robust menggunakan Laravel.',
                'user_id' => $user1, // Assign to first user again for variety
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'category' => 'API Development',
                'created_at' => now()->subDays(20),
                'updated_at' => now()->subDays(20),
            ],
        ];

        foreach ($posts as $postData) {
            Post::updateOrCreate(
                ['slug' => $postData['slug']],
                $postData
            );
        }
    }
}
