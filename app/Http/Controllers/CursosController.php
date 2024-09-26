<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$curso = DB::table("curso")->select("*")->get();
        $curso = DB::select("SELECT cursos.idCurso,cursos.Nombre,cursos.Descripcion,categorias.Nombre AS Categoria FROM cursos INNER JOIN categorias WHERE cursos.idCategoria = categorias.idCategoria");
        $parametros = [
            "arrayCurso" => $curso
        ];
        return view("Cursos.Cursos", $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoria = DB::select("SELECT * FROM categorias");
        $parametros = [
            "arrayCategoria" => $categoria
        ];
        return view("Cursos.Crear_Cursos", $parametros);
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
            'Descripcion' => 'required|max:1000',
            'Categoria' => 'required'
        ]);
        $Nombre = $request->post("Nombre");
        $Descripcion = $request->post("Descripcion");
        $Categoria = $request->post("Categoria");
        $image = base64_encode(file_get_contents($request->file('fileimage')));

        $Respuesta=DB::insert("INSERT INTO cursos(Nombre, Descripcion, idCategoria, Imagen) VALUES (?,?,?,?)", [$Nombre,$Descripcion,$Categoria,$image]);
        if($Respuesta){
            return redirect()->route('Cursos.index');
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
        $curso = DB::select("SELECT cursos.*,categorias.Nombre AS Categoria FROM cursos INNER JOIN categorias ON cursos.idCategoria = categorias.idCategoria WHERE idCurso=$id");
        $parametros = [
            "arrayCurso" => $curso
        ];
        return view("Cursos.Mostrar_Cursos", $parametros);
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
        $curso = DB::select("SELECT * FROM cursos WHERE idCurso=$id");
        if($curso){
            $categoria = DB::select("SELECT * FROM categorias");
            if($categoria){
                $parametros = [
                    "arrayCurso" => $curso,
                    "arrayCategoria" => $categoria
                ];
            }
        }
        return view("Cursos.Editar_Cursos", $parametros);
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
            'Descripcion' => 'required|max:1000',
            'Categoria' => 'required'
        ]);
        $Nombre = $request->post("Nombre");
        $Descripcion = $request->post("Descripcion");
        $Categoria = $request->post("Categoria");
        $image = base64_encode(file_get_contents($request->file('fileimage')));


        $Respuesta=DB::update("UPDATE cursos SET Nombre=?, Descripcion=?,Imagen=?, idCategoria=? WHERE idCurso=?", [$Nombre,$Descripcion,$image,$Categoria,$id]);
        if($Respuesta){
            return redirect()->route('Cursos.index');
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
        $Respuesta=DB::table('Cursos')->where('idCurso', $id)->delete();
        if($Respuesta){
            return redirect()->route('Cursos.index');
        }
        else{
            echo "Curso no eliminado ERROR.";
        }
    }
}
