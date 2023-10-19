<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //category seeder

        DB::table('category')->insert([
            'category_name' => 'Fast Food',
            'category_status' => 'Active',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('category')->insert([
            'category_name' => 'Sweets',
            'category_status' => 'Active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category')->insert([
            'category_name' => 'Cold Drinks',
            'category_status' => 'Active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
