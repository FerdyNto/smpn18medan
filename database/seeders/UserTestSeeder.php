<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Dhana',
            'password' => bcrypt('rahasia123'),
            'nama_user' => 'Lestari Ekha Dhana',
            'lvl' => 'administrator'
        ]);
    }
}
