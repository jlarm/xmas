<?php

namespace Database\Seeders;

use App\Models\Kid;
use Illuminate\Database\Seeder;

class KidSeeder extends Seeder
{
    public function run(): void
    {
        Kid::create(['name' => 'Kailee']);
        Kid::create(['name' => 'Becca']);
        Kid::create(['name' => 'Alissa']);
        Kid::create(['name' => 'Jacob']);
    }
}
