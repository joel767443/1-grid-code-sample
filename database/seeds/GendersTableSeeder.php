<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            'slug' => 'male',
            'label' => 'Male',
            'description' => 'Male',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('genders')->insert([
            'slug' => 'female',
            'label' => 'Female',
            'description' => 'Female',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
