<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            'slug' => 'manager',
            'label' => 'Manager',
            'description' => 'Manager',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('designations')->insert([
            'slug' => 'administrator',
            'label' => 'Administrator',
            'description' => 'Administrator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('designations')->insert([
            'slug' => 'php_developer',
            'label' => 'PHP Developer',
            'description' => 'PHP Developer',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
