<?php

namespace Database\Seeders;

use Database\Factories\ChirpFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chirp;

class ChirpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chirp::factory(5)->create();
    }
}
