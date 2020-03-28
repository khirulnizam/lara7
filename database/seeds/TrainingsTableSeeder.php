<?php

use Illuminate\Database\Seeder;

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('trainings')->insert([
            'title'=>'Laravel Basics',
            'description'=>'2 days Laravel course',
            'trainer'=>'Khirulnizam Abd Rahman',
        ]);

        DB::table('trainings')->insert([
            'title'=>'Laravel Intermediate',
            'description'=>'2 days Laravel course Intermediate Level',
            'trainer'=>'Tarmizi Sanusi',
        ]);

        DB::table('trainings')->insert([
            'title'=>'Laravel Advanced with Unit Test',
            'description'=>'2 days Laravel course Advanced with Unit Test',
            'trainer'=>'Nasrul Hazim',
        ]);
    }
}
