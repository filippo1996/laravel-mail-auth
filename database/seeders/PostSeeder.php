<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 500; $i++){

            $titlePost = 'Titolo - ' . ($i + 1);

            $post = new Post();
            $post->title = $titlePost;
            $post->slug = Str::slug($titlePost, '-');
            $post->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";

            $post->save();
        }
    }
}
