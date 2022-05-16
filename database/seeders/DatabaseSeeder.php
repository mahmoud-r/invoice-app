<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $model = product::class;
    public function run()
    {
        $this->call([
            UserSeeder::class,

        ]);
        \App\Models\Categorie::factory(10)->create();
        \App\Models\product::factory(100)->create();
         \App\Models\invoice::factory(100)->create();
    }
}
