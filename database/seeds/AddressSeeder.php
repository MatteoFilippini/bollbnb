<?php

use App\Models\Address;
use App\Models\Flat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = [
            ['address' => 'via manzoni 2',  'latitude' => ' 45.53622', 'longitude' => '9.47728'],
            ['address' => 'piazza roma 6',  'latitude' => '40.92597', 'longitude' => '14.45826'],
            ['address' => 'corso vittorio emanuele 15', 'latitude' => '37.90196', 'longitude' => '13.42846'],
            ['address' => 'via bergamo 67', 'latitude' => '45.14808', 'longitude' => '10.01025'],
            ];

        $flat_ids=Flat::pluck('id')->toArray();

            for($i=0;$i<count($flat_ids);$i++){
                $address=new Address();
                $address->address=$addresses[$i]['address'];
                // $address->city=$addresses[$i]['city'];
                $address->latitude=$addresses[$i]['latitude'];
                $address->longitude=$addresses[$i]['longitude'];
                $address->position=$addresses[$i]['latitude'] . ',' . $addresses[$i]['longitude'];
                $address->flat_id=$i+1;

                $address->save();
            }
    }
}
