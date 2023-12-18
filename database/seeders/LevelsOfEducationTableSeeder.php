<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelsOfEducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('levels_of_education')->insert([
            ['level_of_education' => 'Bachelors'],
            ['level_of_education' => 'Masters'],
        ]);
    }
}
