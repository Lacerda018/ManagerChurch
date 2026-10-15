<?php

namespace Database\Seeders;

use App\Models\Missionary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Missionary::factory()->count(50)->create();
    }
}
