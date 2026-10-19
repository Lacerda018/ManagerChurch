<?php

namespace Database\Seeders;

use App\Models\Congregation;
use App\Models\Missionary;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        
        Congregation::factory()->count(5)->create();
        
        Missionary::factory(10)->create([
            'congregation_id' => fn () => Congregation::inRandomOrder()->value('id'),
        ]);
    }
}
