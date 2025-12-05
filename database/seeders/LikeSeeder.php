<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();
        foreach($posts as $post) {
            $randUsers = $users->random(rand(0, $users->count()));
            foreach($randUsers as $user) {
                $like = new Like();
                $like->user()->associate($user);
                $like->post()->associate($post);
                $like->save();
            }
        }
    }
}
