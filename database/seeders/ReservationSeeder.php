<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::create
        (
            [
                'name' => 'Alice Johnson',
                'email' => 'alicejg@gmail.com',
                'reservation_time' => '2025-12-02 19:01:10',
                'guest' => 2,
                'note' => 'Window seat, please.'
            ]
        );
        // Reservation::factory()->count(10)->create();
    }
}
