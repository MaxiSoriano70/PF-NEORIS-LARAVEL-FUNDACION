<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Estudiantes_CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Estudiantes_Cursos=DB::select("SELECT cxe.idCursoXEstudiante,es.idEstudiante,es.Dni,es.Nombre,es.Apellido,es.Telefono,c.Nombre as Curso,cxt.Comision,Horario,Estado,tc.Nombre as M
        FROM cursosxestudiantes cxe
        INNER JOIN estudiantes es
        INNER JOIN cursosxtipos cxt
        INNER JOIN cursos c
        INNER JOIN tipos_cursos tc
        ON es.idEstudiante=cxe.idEstudiante
        AND	cxe.idCursoXTipo=cxt.idCursoXTipo
        AND cxt.idCurso=c.idCurso
        AND cxt.idTipo_Curso=tc.idTipo_Curso");
        if($Estudiantes_Cursos){
            $parametros=[
                "arrayDatos"=>$Estudiantes_Cursos
            ];
            return view("Estudiantes_Cursos.Estudiantes_Cursos",$parametros);
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
        $Estudiantes_Curso=DB::select("SELECT * FROM estudiantes");
        if($Estudiantes_Curso){
            $Personal_Cursos= DB::select("SELECT ct.*,c.Nombre as Curso, tc.Nombre AS M
            FROM cursosxtipos ct
            INNER JOIN cursos c
            INNER JOIN tipos_cursos tc
            ON ct.idCurso=c.idCurso
            AND ct.idTipo_Curso=tc.idTipo_Curso
            WHERE ct.Eliminado=1");
            if($Personal_Cursos){
                $parametros=[
                    "arrayEstudiantes" => $Estudiantes_Curso,
                    "arrayCursos" => $Personal_Cursos
                ];
                return view("Estudiantes_Cursos.Crear_Estudiantes_Cursos",$parametros);
            }
            else{
                return view("Institucion.Institucion");
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

                return redirect()->route('Estudiantes_Cursos.index');
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

        $Estudiante_Cursos=DB::select("SELECT cxe.idCursoXEstudiante,es.idEstudiante,es.Dni,es.Nombre,es.Apellido,es.Telefono,c.Nombre as Curso,cxt.Comision,Horario,Turno,Duracion,Fecha_de_Inicio,Fecha_de_Fin,Estado,tc.Nombre as M
        FROM cursosxestudiantes cxe
        INNER JOIN estudiantes es
        INNER JOIN cursosxtipos cxt
        INNER JOIN cursos c
        INNER JOIN tipos_cursos tc
        ON es.idEstudiante=cxe.idEstudiante
        AND	cxe.idCursoXTipo=cxt.idCursoXTipo
        AND cxt.idCurso=c.idCurso
        AND cxt.idTipo_Curso=tc.idTipo_Curso WHERE cxe.idCursoXEstudiante=$id");
        if($Estudiante_Cursos){
            $parametros=[
                "arrayDatos"=>$Estudiante_Cursos
            ];
            return view("Estudiantes_Cursos.Mostrar_Estudiantes_Cursos",$parametros);
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
        $Estudiante=DB::select("SELECT cxe.*,e.Nombre,Apellido,Dni,cxt.idCursoXTipo,Vacantes,Comision,Horario,c.idCurso,c.Nombre as Curso,tc.idTipo_Curso,tc.Nombre as M
        FROM cursosxestudiantes cxe
        INNER JOIN estudiantes e
        INNER JOIN cursosxtipos cxt
        INNER JOIN cursos c
        INNER JOIN tipos_cursos tc
        ON cxe.idEstudiante=e.idEstudiante
        AND cxe.idCursoXTipo=cxt.idCursoXTipo
        AND cxt.idCurso=c.idCurso
        AND cxt.idTipo_Curso=tc.idTipo_Curso
        WHERE idCursoXEstudiante=$id");
        $idCurso=$Estudiante[0]->idCurso;
        $idTipo_Curso=$Estudiante[0]->idTipo_Curso;
        if($Estudiante){
            $consulta=DB::select("SELECT cxt.idCursoXTipo,Comision,Vacantes,Horario,c.idCurso,c.Nombre as Curso,tc.idTipo_Curso,tc.Nombre as M
            FROM cursosxtipos cxt
            INNER JOIN cursos c
            INNER JOIN tipos_cursos tc
            ON cxt.idCurso=c.idCurso
            AND cxt.idTipo_Curso=tc.idTipo_Curso
            WHERE c.idCurso=$idCurso and tc.idTipo_Curso=$idTipo_Curso and cxt.Vacantes>0");
            if($consulta){
                $parametros=[
                    "arrayEstudiantes" => $Estudiante,
                    "arrayCursos"=>$consulta
                ];
                return view("Estudiantes_Cursos.Editar_Estudiantes_Cursos",$parametros);
            }
        }
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
        $validate=$request->validate([
            "Comision" => 'required',
            "Pago" => 'required'
        ]);
        $ComisionActual=$request->post("Comision_Actual");
        $Comision=$request->post("Comision");
        $Pago=$request->post("Pago");
        $Inscripcion=$request->post("Inscripcion");
        if($Comision!=0){
            $Vacantes_Cursos=DB::select("SELECT Vacantes FROM cursosxtipos WHERE idCursoXTipo=$Comision");
            $Vacantes=$Vacantes_Cursos[0]->Vacantes;
            if($Vacantes_Cursos>0){
                $Cambiar=DB::update("UPDATE cursosxestudiantes SET idCursoXTipo=? WHERE idCursoXEstudiante=?",[$Comision,$id]);
                $Agregar=DB::update("UPDATE cursosxtipos SET Vacantes=? WHERE idCursoXTipo=?",[$Vacantes+1,$ComisionActual]);
                $Quitar=DB::update("UPDATE cursosxtipos SET Vacantes=? WHERE idCursoXTipo=?",[$Vacantes-1,$Comision]);
            }
        }
        if($Pago>0){
            $M_Anteriores=DB::select("SELECT Deuda,Pagado FROM cursosxestudiantes WHERE idCursoXEstudiante=$id");
            $Deuda=$M_Anteriores[0]->Deuda;
            $Pagado=$M_Anteriores[0]->Pagado;
            $Pagar=DB::update("UPDATE cursosxestudiantes SET Deuda=?,Pagado=? WHERE idCursoXEstudiante=?",[$Deuda-$Pago,$Pagado+$Pago,$id]);
            if($Pagar){
                $D=DB::select("SELECT Deuda FROM cursosxestudiantes WHERE idCursoXEstudiante=$id");
                $D1=$D[0]->Deuda;
                if($D1==0){
                    $Pagar=DB::update("UPDATE cursosxestudiantes SET Estado_de_Pago=? WHERE idCursoXEstudiante=?",["Completo",$id]);
                }
            }
        }
        if($Inscripcion!=0){
            $confirmar=DB::update("UPDATE cursosxestudiantes SET Estado=1 WHERE idCursoXEstudiante=?",[$id]);
        }
        return redirect()->route("Estudiantes_Cursos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
            return redirect()->route('Estudiantes_Cursos.index');
        }
        else{
            echo "Estudiante no eliminado del curso";
        }
    }
}
