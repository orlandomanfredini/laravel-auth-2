<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        for($i = 0; $i < 50; $i++){
            $post= new Post();
            $title = $faker->sentence(5);

            $post->title = $title;
            $post->slug = Str::slug($title, '-');
            $post->content = $faker->text(170);

            $post->save();

        }

    }
}
