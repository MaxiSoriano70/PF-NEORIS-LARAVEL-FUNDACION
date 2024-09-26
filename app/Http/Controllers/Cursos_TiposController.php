<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cursos_TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursosXTipos= DB::select("SELECT cursosxtipos.*, tipos_cursos.Nombre AS Modalidad,cursos.Nombre AS Curso
        FROM cursos INNER JOIN cursosxtipos INNER JOIN tipos_cursos
        ON cursos.idCurso=cursosxtipos.idCurso
        AND cursosxtipos.idTipo_Curso=tipos_cursos.idTipo_Curso");
        $parametros=[
            "arrayCursos_Tipos" => $cursosXTipos
        ];
        return view("Cursos_Tipos.Cursos_Tipos",$parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Cursos = DB::select("SELECT idCurso, Nombre FROM cursos");
        if($Cursos){
            $TiposCursos = DB::select("SELECT * FROM tipos_cursos");
            if($TiposCursos){
                $parametros = [
                    "arrayCursos" => $Cursos,
                    "arrayTiposCursos" => $TiposCursos
                ];
            }else{

                echo "error";
            }
        }else{
            echo "error";
        }
        return view("Cursos_Tipos.Crear_Cursos_Tipos",$parametros);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "Duracion"=>'required|max:45',
            "Vacantes"=>'required|max:45',
            "Curso"=>'required',
            "Modalidad"=>'required'
        ]);
        $Duracion = $request->post("Duracion");
        $Vacantes = $request->post("Vacantes");
        $Curso = $request->post("Curso");
        $Modalidad = $request->post("Modalidad");
        $Fecha_de_Inicio = $request->post("Fecha_de_Inicio");
        $Fecha_de_Fin = $request->post("Fecha_de_Fin");
        if($Fecha_de_Inicio>=$Fecha_de_Fin){
            $Fecha_de_Inicio=NULL;
            $Fecha_de_Fin=NULL;
        }
        $Turno = $request->post("Turno");
        $Horario = $request->post("Horario");
        $Precio = $request->post("Precio");
        if($Turno == '') {
            $Turno = NULL;
        }
        if($Horario == '') {
            $Horario = NULL;
        }
        if($Precio == '') {
            $Precio = NULL;
        }
        $Res_camada=DB::select("SELECT Camada FROM cursos WHERE idCurso = $Curso");
        $aux=$Res_camada[0]->Camada;
        $Respuesta=DB::insert("INSERT INTO cursosxtipos(Duracion,Comision,Vacantes,Fecha_de_Inicio,Fecha_de_Fin,Turno,Horario,Precio,idCurso,idTipo_Curso) VALUES (?,?,?,?,?,?,?,?,?,?)", [$Duracion,$aux,$Vacantes,$Fecha_de_Inicio,$Fecha_de_Fin,$Turno,$Horario,$Precio,$Curso,$Modalidad]);
        if($Respuesta){
            $camada=$aux+1;
            $Respuesta3=DB::update("UPDATE cursos SET Camada=? WHERE idCurso=?",[$camada,$Curso]);
            if($Respuesta3){
                return redirect()->route("Cursos_Tipos.index");
            }
        }
        else{
            return redirect()->route("Institucion.index");
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
        $cursosXTipos= DB::select("SELECT cursosxtipos.*, tipos_cursos.Nombre AS Modalidad,cursos.Nombre AS Curso FROM cursos INNER JOIN cursosxtipos INNER JOIN tipos_cursos
        ON cursos.idCurso=cursosxtipos.idCurso AND cursosxtipos.idTipo_Curso=tipos_cursos.idTipo_Curso WHERE idCursoXTipo=$id");
        $parametros=[
            "arrayCursos_Tipos" => $cursosXTipos
        ];
        return view("Cursos_Tipos.Mostrar_Cursos_Tipos",$parametros);
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
        $cursosXTipos= DB::select("SELECT cursosxtipos.*, tipos_cursos.Nombre
        AS Modalidad,cursos.Nombre
        AS Curso FROM cursos
        INNER JOIN cursosxtipos
        INNER JOIN tipos_cursos
        ON cursos.idCurso=cursosxtipos.idCurso and
        cursosxtipos.idTipo_Curso=tipos_cursos.idTipo_Curso WHERE cursosxtipos.idCursoXTipo=$id");
        if($cursosXTipos){
            $Tipos_Cursos=DB::select("SELECT * FROM tipos_cursos");
            if($Tipos_Cursos){
                $parametros=[
                    "arrayCursos_Tipos" => $cursosXTipos,
                    "arrayTipos_Cursos" => $Tipos_Cursos
                ];
            }
        }

        return view("Cursos_Tipos.Editar_Cursos_Tipos",$parametros);
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
            "Duracion"=>'required|max:45',
            "Vacantes"=>'required|max:45',
            "Modalidad"=>'required'
        ]);
        $Duracion = $request->post("Duracion");
        $Vacantes = $request->post("Vacantes");
        $Modalidad = $request->post("Modalidad");
        $Fecha_de_Inicio = $request->post("Fecha_de_Inicio");
        $Fecha_de_Fin = $request->post("Fecha_de_Fin");
        if($Fecha_de_Inicio>=$Fecha_de_Fin){
            $Fecha_de_Inicio=NULL;
            $Fecha_de_Fin=NULL;
        }
        $Turno = $request->post("Turno");
        $Horario = $request->post("Horario");
        $Precio = $request->post("Precio");
        if($Turno == '') {
            $Turno = NULL;
        }
        if($Horario == '') {
            $Horario = NULL;
        }
        if($Precio == '') {
            $Precio = NULL;
        }
        $Respuesta=DB::update("UPDATE cursosxtipos SET Duracion=?,Vacantes=?,Fecha_de_Inicio=?,Fecha_de_Fin=?,Turno=?,Horario=?,Precio=?,idTipo_Curso=? WHERE idCursoXTipo=?", [$Duracion,$Vacantes,$Fecha_de_Inicio,$Fecha_de_Fin,$Turno,$Horario,$Precio,$Modalidad,$id]);
        if($Respuesta){
            return redirect()->route("Cursos_Tipos.index");
        }
        else{
            return redirect()->route("Institucion.index");
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
        $Consulta = DB::select("SELECT Eliminado FROM cursosxtipos WHERE idCursoXTipo=$id");
        $Eliminado = $Consulta[0]->Eliminado;
        //var_dump($Eliminado);
        if($Eliminado == 1){
            $Respuesta = DB::update("UPDATE cursosxtipos SET Eliminado=0 WHERE idCursoXTipo=?",[$id]);
            if($Respuesta){
                return redirect()->route("Cursos_Tipos.index");
            }
        }
        elseif($Eliminado==0){
            $Respuesta = DB::update("UPDATE cursosxtipos SET Eliminado=1 WHERE idCursoXTipo=?",[$id]);
            if($Respuesta){
                return redirect()->route("Cursos_Tipos.index");
            }
        }
        else{
            echo "ERROR";
        }
    }
}
