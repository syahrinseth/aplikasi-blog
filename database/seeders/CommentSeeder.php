<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            // Add 2-3 comments per post
            for ($i = 1; $i <= rand(2, 3); $i++) {
                Comment::create([
                    'content' => "This is a sample comment #{$i} for the post '{$post->title}'. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                    'author_name' => 'John Doe ' . $i,
                    'author_email' => "john{$i}@example.com",
                    'post_id' => $post->id,
                    'user_id' => null, // Anonymous comments
                ]);
            }
        }
    }
}
