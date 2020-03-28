<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subjects')->insert([
            'title'=>'Laravel Basics',
            'desc'=>'2 days Laravel course',
            'trainer'=>'Khirulnizam Abd Rahman',
        ]);

        DB::table('subjects')->insert([
            'title'=>'Laravel Intermediate',
            'desc'=>'2 days Laravel course Intermediate Level',
            'trainer'=>'Tarmizi Sanusi',
        ]);

        DB::table('subjects')->insert([
            'title'=>'Laravel Advanced with Unit Test',
            'desc'=>'2 days Laravel course Advanced with Unit Test',
            'trainer'=>'Nasrul Hazim',
        ]);
    }
}
