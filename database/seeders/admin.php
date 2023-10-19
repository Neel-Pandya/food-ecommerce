<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin Seeder

        DB::table('admin')->insert([
            'admin_name' => 'Neel Pandya',
            'admin_email' => 'npandya757@rku.ac.in',
            'admin_password' => 'N2479717',
            'admin_number' => '8866163085',
            'admin_profile' => 'default.jpg',
        ]);
    }
}
