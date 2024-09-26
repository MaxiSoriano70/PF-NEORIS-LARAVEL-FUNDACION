<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal = DB::table("personal")->select("*")->get();
        $parametros = [
            "arrayPersonal" => $personal
        ];
        return view("Personal.Personal", $parametros);

        /*echo "<h1> Hola esta es la ventana de Personal</h1>";*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("Personal.Crear_Personal");
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
            'Email' => 'email:rfc,dns'
        ]);
        $Clave_1 = $request->post("Clave");
        $Clave_2 = $request->post("Clave_c");
        if($Clave_1===$Clave_2){
            $Nombre = $request->post("Nombre");
            $Apellido = $request->post("Apellido");
            $Dni = $request->post("Dni");
            $Email = $request->post("Email");
            $Telefono = $request->post("Telefono");
            $Fecha_Nacimiento = $request->post("Fecha_de_nacimiento");
            $Direccion = $request->post("Direccion");
            $Codigo_Area = $request->post("Codigo_Area");
            $idTipo = $request->post("idTipo");
            if($Telefono == '') {
                $Telefono = NULL;
            }
            if($Codigo_Area == '') {
                $Codigo_Area = NULL;
            }
            if($Fecha_Nacimiento == '') {
                $FechaNacimiento = NULL;
            }
            if($Direccion == '') {
                $Direccion = NULL;
            }
            $Respuesta=DB::insert("INSERT INTO personal(Nombre,Apellido,Dni,Email,Clave,Codigo_Area,Telefono,Fecha_Nacimiento,Direccion,idTipo)
            VALUES (?,?,?,?,?,?,?,?,?,?)", [$Nombre,$Apellido,$Dni,$Email,$Clave_1,$Codigo_Area,$Telefono,$Fecha_Nacimiento,$Direccion,$idTipo]);
            if($Respuesta){
                return redirect()->route('Personal.index');
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
        //
        $personal = DB::table("personal")->select("*")->where("idPersonal",$id)->get();
        $parametros = [
            "arrayPersonal" => $personal
        ];
        return view("Personal.Mostrar_Personal", $parametros);
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
        $personal = DB::table("personal")->select("*")->where("idPersonal",$id)->get();
        $parametros = [
            "arrayPersonal" => $personal
        ];
        return view("Personal.Editar_Personal", $parametros);
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
            $Fecha_Nacimiento = $request->post("Fecha_de_nacimiento");
            $Direccion = $request->post("Direccion");
            $Codigo_Area = $request->post("Codigo_Area");
            $idTipo = $request->post("idTipo");
            if($Telefono == '') {
                $Telefono = NULL;
            }
            if($Codigo_Area == '') {
                $Codigo_Area = NULL;
            }
            if($Fecha_Nacimiento == '') {
                $FechaNacimiento = NULL;
            }
            if($Direccion == '') {
                $Direccion = NULL;
            }
            $Respuesta=DB::update("UPDATE personal SET Nombre=?,Apellido=?,Dni=?,Email=?,Clave=?,Codigo_Area=?,Telefono=?,Fecha_Nacimiento=?,Direccion=?,idTipo=?
            WHERE idPersonal=?", [$Nombre,$Apellido,$Dni,$Email,$Clave_1,$Codigo_Area,$Telefono,$Fecha_Nacimiento,$Direccion,$idTipo,$id]);
            if($Respuesta){
                return redirect()->route('Personal.index');
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
        //
        $Respuesta=DB::table('personal')->where('idPersonal', $id)->delete();
        if($Respuesta){
            return redirect()->route('Personal.index');
        }
        else{
            echo "Personal no eliminado ERROR.";
        }
    }
}
