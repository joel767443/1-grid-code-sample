<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employment_types')->insert([
            'slug' => 'permanent',
            'label' => 'Permanent',
            'description' => 'Permanent',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('employment_types')->insert([
            'slug' => 'contract',
            'label' => 'Contract',
            'description' => 'Contract',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('employment_types')->insert([
            'slug' => 'part_time',
            'label' => 'Part Time',
            'description' => 'Part Time',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('employment_types')->insert([
            'slug' => 'intern',
            'label' => 'Intern',
            'description' => 'Intern',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
