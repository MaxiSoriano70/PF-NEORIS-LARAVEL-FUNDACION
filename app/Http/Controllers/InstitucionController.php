<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $institucion = DB::table("institucion")->select("*")->get();
        $parametros = [
            "arrayInstitucion" => $institucion
        ];
        return view("Institucion.Institucion", $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parametros = [
            "Titulo" => "Crear Nueva Institucion"
        ];
        return view("Institucion.Crear_Institucion", $parametros);
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'email' => 'email:rfc,dns'

        $validated = $request->validate([
            'Nombre' => 'required|max:45',
            'Direccion' => 'required|max:45',
            'Telefono' => 'required|max:45',
            'Email' => 'email:rfc,dns'
        ]);

        $Nombre = $request->post("Nombre");
        $Direccion = $request->post("Direccion");
        $Telefono = $request->post("Telefono");
        $Email = $request->post("Email");
        $Facebook = $request->post("Facebook");
        $Instragram = $request->post("Instragram");
        $Twitter = $request->post("Twitter");
        $Linkedin = $request->post("Linkedin");
        $Mision = $request->post("Mision");
        $Vision = $request->post("Vision");
        if($Facebook == '') {
            $Facebook = NULL;
          }
        if($Instragram == '') {
            $Instragram = NULL;
          }
        if($Twitter == '') {
            $Twitter = NULL;
          }
        if($Linkedin == '') {
            $Linkedin = NULL;
          }
        if($Mision == '') {
            $Mision = NULL;
          }
        if($Vision == '') {
            $Vision = NULL;
          }
        
        DB::insert("INSERT INTO institucion(Nombre,Direccion,Telefono,Email,Facebook,Instragram,Twitter,Linkedin,Mision,Vision)
         VALUES (?,?,?,?,?,?,?,?,?,?)", [$Nombre,$Direccion,$Telefono,$Email,$Facebook,$Instragram,$Twitter,$Linkedin,$Mision,$Vision]);

        return redirect()->route('Institucion.index');

        /*
         DB::table(institucion)->insert([
             ""=> $ ;,
             ""=> $ ;
         ]);
        */
        
    }

    /**
     * Display the specified resource.
     * Mostrar un Valor en especifico.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institucion = DB::table("institucion")->select("*")->where("idInstitucion",$id)->get();
        /*$institucion = DB::select("SELECT * FROM institucion WHERE idInstitucion = $id")->get();*/
        $parametros = [
            "arrayInstitucion" => $institucion
        ];
        return view("Institucion.Mostrar_Institucion", $parametros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institucion = DB::table("institucion")->select("*")->where("idInstitucion",$id)->get();
        $parametros = [
            "arrayInstitucion" => $institucion
        ];
        return view("Institucion.Editar_Institucion", $parametros);
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
            'Direccion' => 'required|max:45',
            'Telefono' => 'required|max:45',
            'Email' => 'email:rfc,dns'
        ]);
        $Nombre = $request->post("Nombre");
        $Direccion = $request->post("Direccion");
        $Telefono = $request->post("Telefono");
        $Email = $request->post("Email");
        $Facebook = $request->post("Facebook");
        $Instragram = $request->post("Instragram");
        $Twitter = $request->post("Twitter");
        $Linkedin = $request->post("Linkedin");
        $Mision = $request->post("Mision");
        $Vision = $request->post("Vision");

        DB::update("UPDATE institucion SET Nombre=? ,Direccion=? ,Telefono=? ,Email=? ,Facebook=? ,Instragram=? ,Twitter=? ,Linkedin=? ,Mision=? ,Vision=? WHERE idInstitucion = ?", [$Nombre,$Direccion,$Telefono,$Email,$Facebook,$Instragram,$Twitter,$Linkedin,$Mision,$Vision,$id]);
        return redirect()->route('Institucion.show',[$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('institucion')->where('idInstitucion', $id)->delete();
        return redirect()->route('Institucion.index');
    }
}
