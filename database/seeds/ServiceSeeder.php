<?php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['name' => 'WiFi',],
            ['name' => 'Cucina',],
            ['name' => 'Aria Condizionata',],
            ['name' => 'Permesso Fumare',],
            ['name' => 'Piscina',],
            ['name' => 'Posto Macchina',],
            ['name' => 'Portineria',],
            ['name' => 'Sauna',],
            ['name' => 'Vista Mare']
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->type = $service['name'];
            $newService->save();
        }
    }
}
