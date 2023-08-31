<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i <= 10; $i++)
            DB::table('users')->insert([
                'name' => fake()->unique()->name(),
                'email' => fake()->unique()->safeEmail(),
                'mobile' => fake()->unique()->phoneNumber(),
                'password' => fake()->unique()->password(6, 16),
                'address' => fake()->unique()->text()
            ]);
    }
}
