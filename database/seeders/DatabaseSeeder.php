<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // memanggil seeder lain yang ada di folder seeders dengan cara memanggil method call dan mengirimkan array dari kelas seeder yang akan dipanggil
        $this->call([
            DetailProfileSeeder::class,
        ]);

        // bisa juga membuat seeder baru dengan cara menggunakan model atau bisa juga langsung menggunakan query builder
        // menggunakan model
        User::insert([
            'name' => 'Kateru Riyu',
            'username' => 'kateruriyu',
            'email' => 'kateruriyu@gmail.com',
            'password' => bcrypt('kateruriyu'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
