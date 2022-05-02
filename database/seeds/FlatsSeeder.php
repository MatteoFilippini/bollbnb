<?php

use App\Models\Flat;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class FlatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flats = [
            ['title' => 'Villa con piscina favolosa','description' => 'descrizoine 1 della casa', 'rooms' => '10', 'beds' => '8', 'bathrooms' => '4', 'square_meters' =>'250', 'visible' => '1', 'default_image' => 'https://www.casevacanzapozzallo.it/images/900/1000009/22_villa-lusso-piscina-ispica-.jpg'],
            ['title' => 'Appartamento in piazza del Duomo','description' => 'descrizoine wdsdsadcasa', 'rooms' => '4', 'beds' => '6', 'bathrooms' => '2', 'square_meters' =>'100', 'visible' => '0', 'default_image' => 'https://upload.wikimedia.org/wikipedia/commons/f/f8/Milano%2C_Duomo%2C_2016-06_CN-04.jpg'],
            ['title' => 'Grazioso appartamento vista mare','description' => 'descrizoine 1 dellsadasdasdsada casa', 'rooms' => '6', 'beds' => '5', 'bathrooms' => '3', 'square_meters' =>'120', 'visible' => '0', 'default_image' => 'https://www.investireoggi.it/fisco/wp-content/uploads/sites/6/2021/09/bonus-facciate-case-vista-mare.jpg'],
            ['title' => 'Baita immersa nella natura in montagna','description' => 'descsasdrizoine 1 dellsaddddddddddddddddddda casa', 'rooms' => '3', 'beds' => '2', 'bathrooms' => '1', 'square_meters' =>'70', 'visible' => '1', 'default_image' => 'https://ultimenews.net/wp-content/uploads/2019/01/baita-in-montagna.jpg'],
            ];

            $user_ids=User::pluck('id')->toArray();

            for($i=0;$i<count($flats);$i++){
                $flat=new Flat();
                $flat->title=$flats[$i]['title'];
                $flat->description=$flats[$i]['description'];
                $flat->rooms=$flats[$i]['rooms'];
                $flat->beds=$flats[$i]['beds'];
                $flat->bathrooms=$flats[$i]['bathrooms'];
                $flat->square_meters=$flats[$i]['square_meters'];
                $flat->visible=$flats[$i]['visible'];
                $flat->default_image=$flats[$i]['default_image'];
                $flat->user_id=Arr::random($user_ids);

                $flat->save();
            }
    }
}
