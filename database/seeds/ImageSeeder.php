<?php

use App\Models\Flat;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $flat_ids=Flat::pluck('id')->toArray();

        for($i=0;$i<10;$i++){
            $image=new Image();
            $image->url=$faker->imageUrl(400,400);
            $image->flat_id=Arr::random($flat_ids);
            $image->save();
        }
    }
}
