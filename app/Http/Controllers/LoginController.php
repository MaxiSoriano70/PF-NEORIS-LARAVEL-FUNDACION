<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Login.Login");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function diferenciar(Request $request)
    {
        $Correo = $request->post("Correo");
        $Clave = $request->post("Clave");
        $Personal = DB::table("personal")->select("idPersonal","Nombre","Apellido","idTipo")
        ->where("Email",$Correo)
        ->where("Clave",$Clave)
        ->get();
        if(count($Personal) == 1){
            $id = $Personal[0]->idPersonal;
            $nombre = $Personal[0]->Nombre;
            $apellido = $Personal[0]->Apellido;
            $idTipo = $Personal[0]->idTipo;

            //session(['id'=> $id]);
            session()->put("id", $id);
            session()->put('nombre', $nombre);
            session()->put('apellido', $apellido);
            session()->put('idtipo', $idTipo);
            return redirect()->route('Welcome.index');
        }
        elseif(count($Personal) == 0){
            $Estudiante = DB::table("estudiantes")->select("idEstudiante","Nombre","Apellido","idTipo")
            ->where("Email",$Correo)
            ->where("Clave",$Clave)
            ->get();
            if(count($Estudiante) == 1){
                $id = $Estudiante[0]->idEstudiante;
                $nombre = $Estudiante[0]->Nombre;
                $apellido = $Estudiante[0]->Apellido;
                $idTipo = $Estudiante[0]->idTipo;
                session()->put("id", $id);
                session()->put('nombre', $nombre);
                session()->put('apellido', $apellido);
                session()->put('idtipo', $idTipo);
                return redirect()->route('Welcome.index');
            }
            else{
                echo "No estas Registrado";
            }
        }
        else{
            echo 'Usted no esta Registrado en el Sistema';
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Login.Register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombre' => 'required|max:45',
            'Apellido' => 'required|max:45',
            'Dni' => 'required_with:end_page|integer|min:8',
            'Email' => 'email:rfc,dns',
            'Clave' => ['required', 'confirmed', Password::min(8)->letters()
            ->mixedCase()
            ->numbers()
            ->uncompromised()],
            'Clave_c' => ['required', 'confirmed', Password::min(8)->letters()
            ->mixedCase()
            ->numbers()
            ->uncompromised()]
        ]);
        $Clave_1 = $request->post("Clave");
        $Clave_2 = $request->post("Clave_c");
        if($Clave_1===$Clave_2){
            $Nombre = $request->post("Nombre");
            $Apellido = $request->post("Apellido");
            $Dni = $request->post("Dni");
            $Email = $request->post("Email");
            $Telefono = $request->post("Telefono");
            $Fecha_Nacimiento = $request->post("Fecha_Nacimiento");
            $Direccion = $request->post("Direccion");
            $Codigo_Area = $request->post("Codigo_Area");
            if($Telefono == '') {
                $Telefono = NULL;
            }
            if($Codigo_Area == '') {
                $Codigo_Area = NULL;
            }
            if($Fecha_Nacimiento == '') {
                $Fecha_Nacimiento = NULL;
            }
            if($Direccion == '') {
                $Direccion = NULL;
            }
            $Respuesta=DB::insert("INSERT INTO estudiantes(Nombre,Apellido,Dni,Email,Clave,Codigo_Area,Telefono,Fecha_Nacimiento,Direccion)
            VALUES (?,?,?,?,?,?,?,?,?)", [$Nombre,$Apellido,$Dni,$Email,$Clave_1,$Codigo_Area,$Telefono,$Fecha_Nacimiento,$Direccion]);
            if($Respuesta){
                return redirect()->route('Welcome.index');
            }
            else{
                return redirect()->route('Login.index');
            }
        }
        else{
            echo "Claves no son igules.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $idTipo=session()->get('idtipo');
        if($idTipo == 3){
            $estudiantes = DB::table("estudiantes")->select("*")->where("idEstudiante",$id)->get();
            $parametros = [
                "arrayUser" => $estudiantes
            ];
            return view("Login.Show_User", $parametros);
        }else{
            return redirect()->route('Welcome.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estudiante = DB::table("estudiantes")->select("*")->where("idEstudiante",$id)->get();
        $parametros = [
            "arrayEstudiante" => $estudiante
        ];
        return view("Login.Edit_User", $parametros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'Nombre' => 'required|max:45',
            'Apellido' => 'required|max:45',
            'Dni' => 'required_with:end_page|integer|min:8',
            'Email' => 'email:rfc,dns',
            'Clave' => ['required', 'confirmed', Password::min(8)->letters()
            ->mixedCase()
            ->numbers()
            ->uncompromised()],
            'Clave_c' => ['required', 'confirmed', Password::min(8)->letters()
            ->mixedCase()
            ->numbers()
            ->uncompromised()]
        ]);
        $Clave_1 = $request->post("Clave");
        $Clave_2 = $request->post("Clave_c");
        if($Clave_1===$Clave_2){
            $Nombre = $request->post("Nombre");
            $Apellido = $request->post("Apellido");
            $Dni = $request->post("Dni");
            $Email = $request->post("Email");
            $Telefono = $request->post("Telefono");
            $Fecha_Nacimiento = $request->post("Fecha_Nacimiento");
            $Direccion = $request->post("Direccion");
            $Codigo_Area = $request->post("Codigo_Area");

            $Respuesta=DB::update("UPDATE estudiantes SET Nombre=?,Apellido=?,Dni=?,Email=?,Clave=?,Codigo_Area=?,Telefono=?,Fecha_Nacimiento=?,Direccion=?
            WHERE idEstudiante=?", [$Nombre,$Apellido,$Dni,$Email,$Clave_1,$Codigo_Area,$Telefono,$Fecha_Nacimiento,$Direccion,$id]);
            if($Respuesta){
                return redirect()->route('Login.show',[$id]);
            }
            else{
                return redirect()->route('Institucion.index');
            }
        }
        else{
            echo "Claves no son igules.";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        session()->flush();
        return redirect()->route("Welcome.index");
    }
}
