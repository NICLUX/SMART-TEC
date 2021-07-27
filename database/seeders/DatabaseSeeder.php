<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class
DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(2)->create();
        \App\Models\Proveedor::factory(45)->create();
        \App\Models\Cliente::factory(45)->create();
        $this->call(Tipo_userSeeder::class);
        $this->call(UserTableseeder::class);

    }

}
