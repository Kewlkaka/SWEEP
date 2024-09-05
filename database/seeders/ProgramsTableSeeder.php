<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('programs')->insert([
            ['programs' => 'Computer Science'],
            ['programs' => 'Bachelors of Business Administration'],
            ['programs' => 'Accounting and Finance'],
            ['programs' => 'Media Sciences'],
        ]);
    }
}
