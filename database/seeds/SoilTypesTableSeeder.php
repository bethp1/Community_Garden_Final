<?php

use Illuminate\Database\Seeder;

class SoilTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('soil_types')->insert([
            'soilType' => 'sandy',
            'systemID' => 2,
            'comments' => 'planted carrots to test how they grow',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
