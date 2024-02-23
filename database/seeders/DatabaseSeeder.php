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

            //prima quella senza chiave esterna
            TypeTableSeeder :: class,

            //project ha la chiave esterna
            ProjectTableSeeder :: class,

            TechnologyTableSeeder :: class,

        ]);

    }
}
