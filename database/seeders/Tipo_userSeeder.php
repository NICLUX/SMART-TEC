<?php

namespace Database\Seeders;

use App\Models\Tipo_user;
use Illuminate\Database\Seeder;

class Tipo_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_user = new Tipo_user();
        $tipo_user ->tipo_users ="Administrador";
        $tipo_user ->save();

        $tipo_user = new Tipo_user();
        $tipo_user ->tipo_users = "Empleado";
        $tipo_user ->save();

        $tipo_user = new Tipo_user();
        $tipo_user ->tipo_users = "Cajero";
        $tipo_user ->save();
    }

}
