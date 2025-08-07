<?php

namespace App\Models;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Asas Laravel untuk Pemula',
                'content' => 'Pelajari asas-asas Laravel dari awal hingga mahir. Panduan lengkap untuk memulakan projek pertama anda dengan kerangka kerja PHP yang popular ini. Termasuk tips dan trik untuk pembangunan yang berkesan.',
                'created_at' => '2024-12-15',
                'category' => 'Pembangunan Web',
                'author' => 'Ahmad Rahman',
                'author_avatar' => 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'author_job_title' => 'Pengajar Laravel',
            ],
            [
                'id' => 2,
                'title' => 'Menguasai Eloquent ORM dalam Laravel',
                'content' => 'Pelajari cara menggunakan Eloquent ORM dalam Laravel untuk menguruskan pangkalan data dengan lebih berkesan. Panduan langkah demi langkah untuk membina model, relasi, dan kueri yang kompleks.',
                'created_at' => '2024-12-10',
                'category' => 'Pangkalan Data',
                'author' => 'Siti Nurhaliza',
                'author_avatar' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'author_job_title' => 'Pembangun Backend',
            ],
            [
                'id' => 3,
                'title' => 'Reka Bentuk Responsif dengan Tailwind CSS',
                'content' => 'Pelajari cara mencipta antara muka pengguna yang menarik dan responsif menggunakan Tailwind CSS. Tips dan teknik terkini untuk reka bentuk web moden yang mesra mudah alih.',
                'created_at' => '2024-12-05',
                'category' => 'Frontend',
                'author' => 'Farid Azman',
                'author_avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                'author_job_title' => 'Pereka UI/UX',
            ],
        ];
    }
}
