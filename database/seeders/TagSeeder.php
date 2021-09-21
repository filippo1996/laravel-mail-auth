<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Laravel','Cli','Ecama Script','Ubuntu','Linux','Server','php','JavaScript'];

        foreach($tags as $tag){
            $newTag = new Tag();

            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag);

            $newTag->save();
        }

    }
}
