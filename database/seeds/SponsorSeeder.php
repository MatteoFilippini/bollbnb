<?php

use App\Models\Sponsor;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = config('sponsors');

        foreach ($sponsors as $sponsor) {
            $new_sponsor = new Sponsor();
            $new_sponsor->label = $sponsor['label'];
            $new_sponsor->price = $sponsor['price'];
            $new_sponsor->length = $sponsor['length'];
            $new_sponsor->save();
        }
    }
}
