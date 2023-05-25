<?php

namespace Database\Seeders;

use App\Models\Comercio;
use App\Models\Produtos;
use App\Models\User;
use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();
        // Comercio::factory(20)->create();
        Produtos::factory(20)->create();
    }
}
