<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Mis_CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('id')) {
            $idEstudiantes=session()->get('id');
            $MisCursos=DB::select("SELECT c.Nombre as Curso,Imagen,cxt.Comision,cxt.idCursoXTipo,Duracion,Fecha_de_Inicio,Fecha_de_Fin,Turno,Horario
            FROM cursosxestudiantes cxe
            INNER JOIN cursosxtipos cxt
            INNER JOIN cursos c
            INNER JOIN tipos_cursos tc
            ON cxe.idCursoXTipo=cxt.idCursoXTipo
            AND cxt.idCurso=c.idCurso
            AND cxt.idTipo_Curso=tc.idTipo_Curso
            WHERE cxe.idEstudiante=$idEstudiantes");
            if($MisCursos){
                $parametros=[
                    "arrayMisCursos" => $MisCursos
                ];
                return view("Mis_Cursos.Mis_Cursos",$parametros);
            }
        }else{
            return redirect()->route("Login.index");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $validate = $request->validate([
            "Alumno"=>'required',
            "Curso"=>'required'
        ]);
        $alumno=$request->post("Alumno");
        $curso=$request->post("Curso");
        $cursos_precio=DB::select("SELECT precio,vacantes from cursosxtipos WHERE idCursoXTipo=$curso");
        $precio=$cursos_precio[0]->precio;
        $vacantes=$cursos_precio[0]->vacantes;
        if($cursos_precio){
            $consulta=DB::insert("INSERT INTO cursosxestudiantes (idEstudiante,Total_a_Pagar,Deuda,idCursoXTipo) VALUES (?,?,?,?)",[$alumno,$precio,$precio,$curso]);
            if($consulta){
                $aux=$vacantes-1;
                $actualizar=DB::update("UPDATE cursosxtipos SET vacantes=? WHERE idCursoXTipo=?",[$aux,$curso]);

                return redirect()->route('Welcome.index');
            }
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
        if(session()->has('id')){
            $idKevin=session()->get('id');
            $MisCursos=DB::select("SELECT c.Nombre as Curso,Imagen,cxt.idCursoXTipo,Comision,Duracion,Fecha_de_Inicio,Fecha_de_Fin,Turno,Horario,Precio,tc.Nombre as M,cxe.idCursoXEstudiante,Estado,Total_a_Pagar,Deuda
            FROM cursosxestudiantes cxe
            INNER JOIN cursosxtipos cxt
            INNER JOIN cursos c
            INNER JOIN tipos_cursos tc
            ON cxe.idCursoXTipo=cxt.idCursoXTipo
            AND cxt.idCurso=c.idCurso
            AND cxt.idTipo_Curso=tc.idTipo_Curso
            WHERE cxe.idEstudiante=$idKevin and cxt.idCursoXTipo=$id");
            if($MisCursos){
                $parametros=[
                    "arrayMisCursos" => $MisCursos
                ];
                return view("Mis_Cursos.Mostrar_Mis_Cursos",$parametros);
            }
        }else{
            return redirect()->route("Login.index");
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
        $Datos=DB::select("SELECT idCursoXTipo FROM cursosxestudiantes WHERE idCursoXEstudiante=$id");
        $idCursoXTipo=$Datos[0]->idCursoXTipo;
        $Respuesta=DB::table('cursosxestudiantes')->where('idCursoXEstudiante', $id)->delete();
        if($Respuesta){
            $Vacantes_Cursos=DB::select("SELECT Vacantes from cursosxtipos where idCursoXTipo=$idCursoXTipo");
            $Vacantes=$Vacantes_Cursos[0]->Vacantes;
            $aux=$Vacantes+1;
            if($Vacantes_Cursos){
                    $Actualizar=DB::update("UPDATE cursosxtipos SET Vacantes=? WHERE idCursoXTipo=?",[$aux,$idCursoXTipo]);
            }
            return redirect()->route('Mis_Cursos.index');
        }
        else{
            echo "Estudiante no eliminado del curso";
        }
    }
}
