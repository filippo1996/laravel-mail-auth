<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['PHP','Vue Cli','Javascript','React','Java','HTML','CSS','Go','Node JS'];

        foreach($categories as $category){
            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category);

            $newCategory->save();
        }
    }
}
