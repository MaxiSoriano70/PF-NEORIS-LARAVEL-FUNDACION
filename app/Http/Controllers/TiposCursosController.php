<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiposCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoCurso = DB::table("tipos_cursos")->select("*")->get();
        $parametros = [
            "arrayTiposCursos" => $tipoCurso
        ];
        return view("TiposCursos.TiposCursos", $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("TiposCursos.Crear_TiposCursos");
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
            'Nombre' => 'required|max:45'
        ]);
        $Nombre = $request->post("Nombre");

        $Respuesta=DB::insert("INSERT INTO tipos_cursos(Nombre) VALUES (?)", [$Nombre]);
        if($Respuesta){
            return redirect()->route('TiposCursos.index');
        }
        else{
            return redirect()->route('Institucion.index');
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
        $tiposCursos = DB::table("tipos_cursos")->select("*")->where("idTipo_Curso",$id)->get();
        $parametros = [
            "arrayTiposCursos" => $tiposCursos
        ];
        return view("TiposCursos.Editar_TiposCursos", $parametros);
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
            'Nombre' => 'required|max:45'
        ]);
        $Nombre = $request->post("Nombre");

        $Respuesta=DB::update("UPDATE tipos_cursos SET Nombre=? WHERE idTipo_Curso=?", [$Nombre,$id]);
        if($Respuesta){
            return redirect()->route('TiposCursos.index');
        }
        else{
            return redirect()->route('Institucion.index');
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
        $Respuesta=DB::table('tipos_cursos')->where('idTipo_Curso', $id)->delete();
        if($Respuesta){
            return redirect()->route('TiposCursos.index');
        }
        else{
            echo "Categoria no eliminada ERROR.";
        }
    }
}
