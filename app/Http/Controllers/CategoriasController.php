<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = DB::table("Categorias")->select("*")->get();
        $parametros = [
            "arrayCategoria" => $categorias
        ];
        return view("Categorias.Categorias", $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Categorias.Crear_Categorias");
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
            'Descripcion' => 'required|max:1000'
        ]);
        $Nombre = $request->post("Nombre");
        $Descripcion = $request->post("Descripcion");

        $Respuesta=DB::insert("INSERT INTO categorias(Nombre, Descripcion) VALUES (?,?)", [$Nombre,$Descripcion]);
        if($Respuesta){
            return redirect()->route('Categorias.index');
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
        $categorias = DB::table("Categorias")->select("*")->where("idCategoria",$id)->get();
        $parametros = [
            "arrayCategoria" => $categorias
        ];
        return view("Categorias.Mostrar_Categorias", $parametros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = DB::table("Categorias")->select("*")->where("idCategoria",$id)->get();
        $parametros = [
            "arrayCategoria" => $categorias
        ];
        return view("Categorias.Editar_Categorias", $parametros);
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
            'Descripcion' => 'required|max:1000'
        ]);
        $Nombre = $request->post("Nombre");
        $Descripcion = $request->post("Descripcion");

        $Respuesta=DB::update("UPDATE categorias SET Nombre=?,Descripcion=? WHERE idCategoria=?", [$Nombre,$Descripcion,$id]);
        if($Respuesta){
            return redirect()->route('Categorias.index');
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
        $Respuesta=DB::table('Categorias')->where('idCategoria', $id)->delete();
        if($Respuesta){
            return redirect()->route('Categorias.index');
        }
        else{
            echo "Categoria no eliminada ERROR.";
        }
    }
}
