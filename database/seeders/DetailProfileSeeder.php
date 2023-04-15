<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_profile')->insert([
            'address' => 'Jl. Kebon Jeruk Raya No. 1',
            'phone_number' => '081234567890',
            'date_of_birth' => '1999-01-01',
            'photo' => 'photo.jpg',
        ]);
    }
}
