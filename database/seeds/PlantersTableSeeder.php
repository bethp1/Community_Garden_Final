<?php

use Illuminate\Database\Seeder;

class PlantersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planters')->insert([
        'PlanterType' => 'Clay',
        'comments' => 'planted carrots',
        'imageFileName' => '/img/default.png',
        'systemID' => 2,
         'created_at' => now(),
        'updated_at' => now(),
    ]);
}
}
