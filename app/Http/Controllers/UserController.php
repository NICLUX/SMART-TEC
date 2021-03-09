<?php

namespace App\Http\Controllers;
use App\Models\Tipo_user;
use App\Models\User;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users as u')
            ->join('tipo_users as t','u.is_admin','=','t.id')
            ->select('u.*','t.tipo_users')
            ->paginate(5);
        return view('usuarios.users')
            ->with('users',$users);

    }
    public function mostrar()
    {

        $users = User::paginate(6);
        return view('usuarios.tablaUsuario')
            ->with('users',$users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo_user::all();
        $users = User::all();
        return view('usuarios.reistrar_usario')
            ->with("users", $users)
            ->with("tipos", $tipos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required|max:80",
            "email"=>"unique:users,email",
            "is_admin"=>"required|numeric",
            "usuario"=>"required|max:80|unique:users,name,",
            "telefono"=>"required|unique:proveedors,telefono|max:99999999",
            "password"=>"required|min:8",
        ],[
            "nombre.required"=>"Se requiere ingresar el nombre del usuario",
            "usuario.unique"=>"El usuario ya ha sido tomado.",
            "name.max"=>"El nombre del usuario debe ser menor a 100 caracteres",
            "usuario.required"=>"Se debe ingresar el nombre de usuario.",
            "usuario.max"=>"El nombre de usuario debe ser menor a 100 caracteres",
            "telefono.required"=>"Se debe ingresar el numero telefonico del de usuario.",
            "telefono.max"=>"El numero de telefono del usuario debe tener 8 caracteres",
            "telefono.unique"=>"El numero de telefono debe ser unico",
            "email.required"=>"Se debe ingresar el email de usuario.",
            "email.unique"=>"El email debe ser unico",
        ]);


        $user = new User();
        $user->name= $request->input("name");
        $user->email= $request->input("email");
        $user->is_admin= $request->input("is_admin");
        $user->usuario= $request->input("usuario");
        $user->telefono=$request->input("telefono");
        $user->password = bcrypt($request->input("password"));
         $user->save();
        return redirect()->route("usuarios.index")
            ->with("exito","Se creó exitosamente el usuario");

    }

    public function edit($id){
        $tipos=Tipo_user::all();
        $user=User::findOrFail($id);
            return view("usuarios.editar_usuario_para_admin")
            ->with("user",$user)
                ->with("tipos",$tipos);
    }
    public function editar($id){

        $user=User::findOrFail($id);
        return view("usuarios.editar_usuario")
            ->with("user",$user);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            "name"=>"required|max:100",
            "usuario"=>"required|max:100|unique:users,name,".$id,
            "telefono"=>"required|max:11|min:8|unique:users,telefono,".$id,
            "email"=>"required|unique:users,email,".$id

        ],[
            "name.required"=>"Se debe ingresar el nombre del usuario.",
            "name.max"=>"El nombre del usuario debe ser menor a 100 caracteres",
            "usuario.required"=>"Se debe ingresar el nombre de usuario.",
            "usuario.max"=>"El nombre de usuario debe ser menor a 100 caracteres",
            "telefono.required"=>"Se debe ingresar el numero telefonico del de usuario.",
            "telefono.max"=>"El numero de telefono del usuario debe tener 8 caracteres",
            "telefono.unique"=>"El numero de telefono debe ser unico",
            "email.required"=>"Se debe ingresar el email de usuario.",
            "email.unique"=>"El email debe ser unico",
        ]);

        $editarUsuario = User::findOrfail($request->id);
        $editarUsuario->name= $request->input("name");
        $editarUsuario->usuario= $request->input("usuario");
        $editarUsuario->is_admin= $request->input("is_admin");
        $editarUsuario->telefono= $request->input("telefono");
        $editarUsuario->email= $request->input("email");
        $path = public_path() . '\images\categorias';//Carpeta publica de las imagenes
        if($request->imagen_url){
            /***Si la imagen es enviada por el usuario se debe eliminar la anterior **/
            $img_anterior=public_path()."/images/categorias/".$editarUsuario->photo;
            if (File::exists($img_anterior)){
                File::delete($img_anterior);
            }
            $photo = $_FILES["imagen_url"]["name"];
            $ruta = $_FILES["imagen_url"]["tmp_name"];
            //-------------VALIDAR SI LA CARPETA EXISTE---------------------
            if (!file_exists($path)) {
                mkdir($path, 0777, true);

            }
            //-------------------------------------------------------------
            $destino = "images/categorias/" . $photo;
            copy($ruta, $destino);
            $editarUsuario->photo=$photo;
        }

        $editarUsuario->save();

        return redirect()->route("usuarios.index")
            ->with("exito","Se edito correctamente la categoria");
    }

    public function updat(Request $request,$id){
        $this->validate($request,[
            "name"=>"required|max:100",
            "usuario"=>"required|max:100|unique:users,name,".$id,
            "telefono"=>"required|max:11|min:8|unique:users,telefono,".$id,
            "email"=>"required|unique:users,email,".$id

        ],[
            "name.required"=>"Se debe ingresar el nombre del usuario.",
            "name.max"=>"El nombre del usuario debe ser menor a 100 caracteres",
            "usuario.required"=>"Se debe ingresar el nombre de usuario.",
            "usuario.max"=>"El nombre de usuario debe ser menor a 100 caracteres",
            "telefono.required"=>"Se debe ingresar el numero telefonico del de usuario.",
            "telefono.max"=>"El numero de telefono del usuario debe tener 8 caracteres",
            "telefono.unique"=>"El numero de telefono debe ser unico",
            "email.required"=>"Se debe ingresar el email de usuario.",
            "email.unique"=>"El email debe ser unico",
        ]);

        $editarUsuario = User::findOrfail($request->id);
        $editarUsuario->name= $request->input("name");
        $editarUsuario->usuario= $request->input("usuario");
        $editarUsuario->telefono= $request->input("telefono");
        $editarUsuario->email= $request->input("email");
        $path = public_path() . '\images\categorias';//Carpeta publica de las imagenes
        if($request->imagen_url){
            /***Si la imagen es enviada por el usuario se debe eliminar la anterior **/
            $img_anterior=public_path()."/images/categorias/".$editarUsuario->photo;
            if (File::exists($img_anterior)){
                File::delete($img_anterior);
            }
            $photo = $_FILES["imagen_url"]["name"];
            $ruta = $_FILES["imagen_url"]["tmp_name"];
            //-------------VALIDAR SI LA CARPETA EXISTE---------------------
            if (!file_exists($path)) {
                mkdir($path, 0777, true);

            }
            //-------------------------------------------------------------
            $destino = "images/categorias/" . $photo;
            copy($ruta, $destino);
            $editarUsuario->photo=$photo;
        }

        $editarUsuario->save();

        return redirect()->route("usuarios.index")
            ->with("exito","Se edito correctamente la categoria");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);
        $user->delete();
        return redirect()->route("usuarios.index")
            ->with("exito", "Usuario eliminado exitosamente.");
    }
}
