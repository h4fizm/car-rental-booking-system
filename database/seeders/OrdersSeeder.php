<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\User;
use App\Models\Car;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $userIds = User::pluck('id');
        $carIds = Car::pluck('id');

        // Membuat 4 entri untuk tabel orders
        foreach (range(1, 5) as $i) {
            Order::create([
                'user_id' => $userIds->random(),
                'car_id' => $carIds->random(),
                'description' => 'Rental order #' . $i,
                'price' => rand(300000, 1000000),
                'start_date' => now()->addDays(rand(1, 10))->format('Y-m-d'), // Tanggal mulai
                'end_date' => now()->addDays(rand(11, 20))->format('Y-m-d'),   // Tanggal akhir
                'start_time' => now()->addHours(rand(1, 10))->format('H:i'),   // Waktu mulai
                'end_time' => now()->addHours(rand(11, 20))->format('H:i'),     // Waktu akhir
            ]);
        }
    }
}


