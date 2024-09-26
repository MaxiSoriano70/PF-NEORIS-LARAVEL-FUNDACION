<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = DB::table("Estudiantes")->select("*")->get();
        $parametros = [
            "arrayEstudiantes" => $estudiantes
        ];
        return view("Estudiantes.Estudiantes", $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("Estudiantes.Crear_Estudiantes");
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
                return redirect()->route('Estudiantes.index');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiantes = DB::table("estudiantes")->select("*")->where("idEstudiante",$id)->get();
        /*$institucion = DB::select("SELECT * FROM institucion WHERE idInstitucion = $id")->get();*/
        $parametros = [
            "arrayEstudiantes" => $estudiantes
        ];
        return view("Estudiantes.Mostrar_Estudiantes", $parametros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = DB::table("estudiantes")->select("*")->where("idEstudiante",$id)->get();
        $parametros = [
            "arrayEstudiante" => $estudiante
        ];
        return view("Estudiantes.Editar_Estudiantes", $parametros);
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
        $validated = $request->validate([
            'Nombre' => 'required|max:45',
            'Apellido' => 'required|max:45',
            'Dni' => 'required_with:end_page|integer|min:8',
            'Email' => 'email:rfc,dns',
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
                return redirect()->route('Estudiantes.show',[$id]);
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
        $Respuesta=DB::table('estudiantes')->where('idEstudiante', $id)->delete();
        if($Respuesta){
            return redirect()->route('Estudiantes.index');
        }
        else{
            echo "Estudiante no eliminado ERROR.";
        }
    }
}
