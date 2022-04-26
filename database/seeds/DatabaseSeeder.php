<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([SponsorSeeder::class,ServiceSeeder::class,UsersSeeder::class,FlatsSeeder::class,ImageSeeder::class,MessageSeeder::class,AddressSeeder::class]);
    }
}
