<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Administrador";
        $user->usuario="admin";
        $user->telefono="98122412";
        $user->email = "smart-tec@gmail.com";
        $user->photo = "src=/images/logo/admin.jpg";
        $user->password = bcrypt("admin123");
        $user->is_admin = "1";
        $user->save();
    }
}
