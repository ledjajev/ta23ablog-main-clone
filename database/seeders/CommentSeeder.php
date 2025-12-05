<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();
        foreach($posts as $post){
            $comments = Comment::factory(rand(0, 10))->make();
            foreach($comments as $comment) {
                $comment->user()->associate($users->random());
                $comment->post()->associate($post);
                $comment->save();
            }
        }
    }
}
