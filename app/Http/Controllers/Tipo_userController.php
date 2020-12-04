<?php

namespace App\Http\Controllers;

use App\Models\Tipo_user;
use Illuminate\Http\Request;

class Tipo_userController extends Controller
{
    public function index(){
        $tipos= Tipo_user::all();
    }
}
