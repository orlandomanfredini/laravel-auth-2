<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $resources = ['Front-end', 'Back-end', 'full-stack', 'Web-designer', 'DevOps'];

        

        foreach($resources as $resource_name){
            $resource = new Resource();
            $resource->name= $resource_name;
            $resource->slug= Str::slug($resource_name, '-');

            $resource->save();

        }
    }
}
