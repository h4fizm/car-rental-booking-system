<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $typeIds = \App\Models\CarsType::pluck('id');
        $statuses = ['accept', 'cancel', 'reject', 'pending', 'finish'];

        foreach (range(1, 5) as $i) {
            Car::create([
                'name' => 'Car ' . $i,
                'start_rental' => now()->addDays(rand(1, 5)),
                'end_rental' => now()->addDays(rand(6, 10)),
                'status' => $statuses[array_rand($statuses)],
                'type_id' => $typeIds->random(),
            ]);
        }
    }
}
