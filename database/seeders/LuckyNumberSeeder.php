<?php

namespace Database\Seeders;

use App\Models\LuckyNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LuckyNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuckyNumber::factory()->create();
    }
}
