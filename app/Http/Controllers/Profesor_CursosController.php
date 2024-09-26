<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Profesor_CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursosXTipos= DB::select("SELECT personalxcursos.idPersonalXCurso,personal.Nombre,Apellido,Dni,cursos.Nombre as Curso,cursosxtipos.Comision,Turno,tipos_cursos.Nombre as Modalidad FROM personalxcursos
        INNER JOIN personal
        INNER JOIN cursosxtipos
        INNER JOIN tipos_cursos
        INNER JOIN cursos
        ON personalxcursos.idPersonal=personal.idPersonal
        AND personalxcursos.idCursoXTipo=cursosxtipos.idCursoXTipo
        AND cursosxtipos.idCurso=Cursos.idCurso
        AND cursosxtipos.idTipo_Curso=tipos_cursos.idTipo_Curso
        WHERE personal.idTipo=2");
        $parametros=[
            "arrayProfesor_Cursos" => $cursosXTipos
        ];
        return view("Profesor_Cursos.Profesor_Cursos",$parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Personal_Cursos=DB::select("SELECT * FROM personal WHERE idTipo=2");
        if($Personal_Cursos){
            $Datos_Cursos=DB::select("SELECT cursosxtipos.idCursoXTipo,Comision,Turno,Horario,cursos.Nombre AS Curso,tipos_cursos.Nombre AS M FROM cursosxtipos INNER JOIN cursos INNER JOIN tipos_cursos ON cursosxtipos.idCurso=cursos.idCurso AND cursosxtipos.idTipo_Curso=tipos_cursos.idTipo_Curso WHERE cursosxtipos.asignado=0");
            if($Datos_Cursos){
                $parametros=[
                    "arrayPersonalCursos"=>$Personal_Cursos,
                    "arrayDatosCursos"=>$Datos_Cursos
                ];
            }
        }
        return view("Profesor_Cursos.Crear_Profesor_Cursos",$parametros);
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
            "Profesor"=>'required|max:45',
            "Curso"=>'required|max:45'
        ]);
        $Profesor = $request->post("Profesor");
        $Curso = $request->post("Curso");
        $Respuesta=DB::insert("INSERT INTO personalxcursos(idPersonal,idCursoXTipo) VALUES (?,?)", [$Profesor,$Curso]);
        if($Respuesta){
            $Respuesta1=DB::update("UPDATE cursosxtipos SET Asignado=1 WHERE idCursoXTipo=?", [$Curso]);
            if($Respuesta1){
                return redirect()->route("Profesor_Cursos.index");
            }
            else{
                return redirect()->route("Institucion.index");
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
        $ProfesoresxCursos= DB::select("SELECT personalxcursos.idPersonalXCurso,personal.Nombre,Apellido,Dni,cursos.Nombre as Curso,cursosxtipos.Duracion,Comision,Turno,Horario,Fecha_de_Inicio,Fecha_de_Fin,tipos_cursos.Nombre as Modalidad FROM personalxcursos
        INNER JOIN personal
        INNER JOIN cursosxtipos
        INNER JOIN tipos_cursos
        INNER JOIN cursos
        ON personalxcursos.idPersonal=personal.idPersonal
        AND personalxcursos.idCursoXTipo=cursosxtipos.idCursoXTipo
        AND cursosxtipos.idCurso=Cursos.idCurso
        AND cursosxtipos.idTipo_Curso=tipos_cursos.idTipo_Curso
        WHERE personalxcursos.idPersonalXCurso=$id");
        $parametros=[
            "arrayPersonal_Cursos" => $ProfesoresxCursos
        ];
        return view("Profesor_Cursos.Mostrar_Profesor_Cursos",$parametros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Prof_Curso= DB::select("SELECT personalxcursos.idPersonalXCurso,personal.idPersonal,personal.Nombre,Apellido,cursos.Nombre as Curso,cursosxtipos.Comision,tipos_cursos.Nombre as Modalidad FROM personalxcursos
        INNER JOIN personal
        INNER JOIN cursosxtipos
        INNER JOIN tipos_cursos
        INNER JOIN cursos
        ON personalxcursos.idPersonal=personal.idPersonal
        AND personalxcursos.idCursoXTipo=cursosxtipos.idCursoXTipo
        AND cursosxtipos.idCurso=Cursos.idCurso
        AND cursosxtipos.idTipo_Curso=tipos_cursos.idTipo_Curso
        WHERE personalxcursos.idPersonalXCurso=$id");
        if($Prof_Curso){
            $Profesores=DB::select("SELECT * FROM personal WHERE idTipo=2");
            if($Profesores){
                $parametros=[
                    "arrayProf_Curso" => $Prof_Curso,
                    "arrayProfesores" => $Profesores
                ];
            }
        }

        return view("Profesor_Cursos.Editar_Profesor_Cursos",$parametros);
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
            "Profesor"=>'required|max:45'
        ]);
        $Profesor = $request->post("Profesor");
        $Respuesta=DB::update("UPDATE personalxcursos SET idPersonal=? WHERE idPersonalXCurso=?", [$Profesor,$id]);
        if($Respuesta){
            return redirect()->route("Profesor_Cursos.index");
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
        $curso=DB::select("SELECT idCursoXTipo FROM personalxcursos WHERE idPersonalXCurso=$id");
        $id_Curso=$curso[0]->idCursoXTipo;
        $Respuesta=DB::table('personalxcursos')->where('idPersonalXCurso', $id)->delete();
        if($Respuesta){
            $Respuesta1=DB::update("UPDATE cursosxtipos SET Asignado=0 WHERE idCursoXTipo=?", [$id_Curso]);
            if($Respuesta1){
                return redirect()->route("Profesor_Cursos.index");
            }
            else{
                return redirect()->route("Institucion.index");
            }
        }
        else{
            return redirect()->route("Institucion.index");
        }
    }
}
