<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarsType;

class CarsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = ['SUV', 'Sedan', 'Hatchback', 'Pickup'];

        foreach ($types as $type) {
            CarsType::create([
                'name' => $type,
            ]);
        }
    }
}
