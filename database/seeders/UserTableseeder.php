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
        $user->usuario="Valdivia";
        $user->telefono="981224122";
        $user->email = "posonoe@gmail.com";
        $user->photo = "src=/images/logo/admin.jpg";
        $user->password = bcrypt("12345678");
        $user->is_admin = true;
        $user->save();

        $user = new User();
        $user->name = "Director";
        $user->usuario="Xavier94";
        $user->telefono="981224156";
        $user->email = "posonoe@email.com";
        $user->photo = "src=/images/logo/logo.png";
        $user->password = bcrypt("12345678");
        $user->save();

        $user = new User();
        $user->name = "Director";
        $user->usuario="XavierN12";
        $user->telefono="9813241222";
        $user->photo = "src=/images/admin.jpg";
        $user->email = "posonoe@rmail.com";
        $user->password= bcrypt("12345678");
        $user->save();

    }
}
