<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $welcome=DB::select("SELECT c.Nombre as Curso,Descripcion,Imagen,cxt.idCursoXTipo,Duracion,Vacantes,Fecha_de_Inicio,Fecha_de_Fin,Turno,Horario,Precio,tc.Nombre as M FROM cursos c
        INNER JOIN cursosxtipos cxt
        INNER JOIN tipos_cursos tc
        ON c.idCurso=cxt.idCurso
        AND cxt.idTipo_Curso=tc.idTipo_Curso");
        $parametros=[
            "arrayWelcome"=>$welcome
        ];
        return view("Welcome",$parametros);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $welcome=DB::select("SELECT c.Nombre as Curso,Descripcion,Imagen,cxt.idCursoXTipo,Duracion,Vacantes,Fecha_de_Inicio,Fecha_de_Fin,Turno,Horario,Precio,tc.Nombre as M FROM cursos c
        INNER JOIN cursosxtipos cxt
        INNER JOIN tipos_cursos tc
        ON c.idCurso=cxt.idCurso
        AND cxt.idTipo_Curso=tc.idTipo_Curso WHERE cxt.idCursoXTipo=$id");
        $parametros=[
            "arrayWelcome"=>$welcome
        ];
        return view("Welcome.Detalle_Cursos",$parametros);
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
    }
}
