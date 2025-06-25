<?php

namespace Database\Seeders;

use App\Models\Admin\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Track::factory()->count(100)->create();
    }
}
