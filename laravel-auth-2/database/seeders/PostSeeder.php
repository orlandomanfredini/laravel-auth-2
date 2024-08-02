<?php

namespace Database\Seeders;
use App\Models\Resource;
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
        $resources = Resource::all();

        $resource_ids = $resources->pluck('id')->all();

        for($i = 0; $i < 50; $i++){
            $post= new Post();
            $title = $faker->sentence(5);

            $post->title = $title;
            $post->slug = Str::slug($title, '-');
            $post->content = $faker->text(170);
            $post->resource_id = $faker->optional()->randomElement($resource_ids);

            $post->save();

        }

    }
}
