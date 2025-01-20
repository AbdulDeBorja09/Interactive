<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userseeder extends Seeder
{
    public function run(): void
    {

        DB::table('user')->insert([
            [
                'name' => 'Test Adminn',
                'email' => 'user@com',
                'password' => '$2y$12$3GsJuAUcHoY4niR/ldP1ceus0waN6YaC1aHTskeXukbkoGQUPQuNa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
