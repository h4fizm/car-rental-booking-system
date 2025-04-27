<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarsType;

class CarsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = [
            'SUV',
            'Sedan',
            'Pickup',
            'Minivan',
            'TruckBox',
            'Mobil Listrik',
            'Sport',
            'Luxury'
        ];

        foreach ($types as $type) {
            CarsType::create([
                'name' => $type,
            ]);
        }
    }
}
