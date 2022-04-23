<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        
        $this->call([
            //ConsumptionSeeder::class
            DWConsumptionsSeeder::class
            //DimGroupSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();

    }
}
