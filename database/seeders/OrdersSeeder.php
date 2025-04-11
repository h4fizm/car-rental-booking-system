<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $userIds = \App\Models\User::pluck('id');
        $carIds = \App\Models\Car::pluck('id');

        foreach (range(1, 5) as $i) {
            Order::create([
                'user_id' => $userIds->random(),
                'car_id' => $carIds->random(),
                'decription' => 'Rental order #' . $i,
                'price' => rand(300000, 1000000),
                'photo_file' => null, // atau file dummy kalau ingin
            ]);
        }
    }
}
