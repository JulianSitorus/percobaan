<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Damar Dwi Nugroho',
            'email'=>'damardn@satunama.org',
            'password'=>Hash::make('123456')
        ]);

        DB::table('users')->insert([
            'name'=>'Adi Nugraha',
            'email'=>'adi@satunama.org',
            'password'=>Hash::make('1234567')
        ]);
    }
}
