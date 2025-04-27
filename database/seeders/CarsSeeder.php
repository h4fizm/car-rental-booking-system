<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarsType;
use Carbon\Carbon;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = ['accept', 'cancel', 'reject', 'pending', 'finish', null];

        $cars = [
            ['name' => 'Toyota Fortuner', 'type' => 'SUV', 'price' => 700000],
            ['name' => 'Honda Civic', 'type' => 'Sedan', 'price' => 500000],
            ['name' => 'Mitsubishi Triton', 'type' => 'Pickup', 'price' => 550000],
            ['name' => 'Toyota Alphard', 'type' => 'Minivan', 'price' => 1200000],
            ['name' => 'Isuzu Giga Box', 'type' => 'TruckBox', 'price' => 800000],
            ['name' => 'Hyundai Ioniq 5', 'type' => 'Mobil Listrik', 'price' => 1000000],
            ['name' => 'Lamborghini Huracan', 'type' => 'Sport', 'price' => 5000000],
            ['name' => 'Mercedes-Benz S-Class', 'type' => 'Luxury', 'price' => 3000000],
        ];

        foreach ($cars as $carData) {
            $typeId = CarsType::where('name', $carData['type'])->value('id');

            // Random kondisi: ada yang belum disewa (start_rental & end_rental = null)
            $isRented = rand(0, 1);

            // Generate fake image path for each car
            $imagePath = 'images/cars/' . strtolower(str_replace(' ', '_', $carData['name'])) . '.jpg';

            Car::create([
                'name' => $carData['name'],
                'type_id' => $typeId,
                'price' => $carData['price'],
                'description' => 'Deskripsi untuk ' . $carData['name'] . ' dengan tipe ' . $carData['type'] . '.',
                'start_rental' => $isRented ? Carbon::now()->addDays(rand(1, 3)) : null,
                'end_rental' => $isRented ? Carbon::now()->addDays(rand(4, 7)) : null,
                'status' => $isRented ? $statuses[array_rand($statuses)] : null,
                'photo' => $imagePath,  // Menyimpan path gambar
            ]);
        }
    }
}
