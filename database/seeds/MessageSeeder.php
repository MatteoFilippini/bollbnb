<?php

use App\Models\Flat;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $flat_ids=Flat::pluck('id')->toArray();

        for($i=0;$i<8;$i++){
            $message=new Message();
            $message->content = $faker->paragraph(30);
            $message->date = $faker->date('Y-m-d');
            $message->sender_mail = $faker->email();
            $message->sender_name = $faker->name();
            $message->flat_id=Arr::random($flat_ids);
            $message->save();
        }
    }
}
