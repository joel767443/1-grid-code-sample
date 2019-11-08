<?php

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
         $this->call(DesignationsTableSeeder::class);
         $this->call(EmploymentTypesTableSeeder::class);
         $this->call(GendersTableSeeder::class);
    }
}
