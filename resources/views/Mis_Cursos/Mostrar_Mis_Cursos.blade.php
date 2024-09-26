@include('Libs.Header')
<div class="container my-3">
    <h1 class="text-center">{{session()->get('nombre')}} {{session()->get('apellido')}}</h1>
</div>
<div class="row mt-3 align-items-center">
    <div class="col-md col-xl-4">
        <div class="container my-3">
            <div class="row">
                    <div class="col text-center">
                        <a href="{{route('Mis_Cursos.index', session()->get('id'))}}" type="button" class="btn btn-secondary mx-2"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="25" height="25" viewBox="0 0 172 172"
                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,172c47.41968,0 86,-38.58032 86,-86c0,-47.41968 -38.58032,-86 -86,-86c-47.41968,0 -86,38.58032 -86,86c0,47.41968 38.58032,86 86,86zM36.88314,83.46647l32.25,-32.25c0.68587,-0.68587 1.6027,-1.0498 2.53353,-1.0498c0.46191,0 0.92733,0.08748 1.37175,0.27295c1.34025,0.5529 2.21159,1.86165 2.21159,3.31038v7.16667c0,0.95182 -0.37793,1.86165 -1.0498,2.53353l-15.38314,15.38314h73.76628c1.98063,0 3.58333,1.6027 3.58333,3.58333v7.16667c0,1.98063 -1.6027,3.58333 -3.58333,3.58333h-73.76628l15.38314,15.38314c0.67187,0.67188 1.0498,1.58171 1.0498,2.53353v7.16667c0,1.44873 -0.87134,2.75749 -2.21159,3.31038c-1.34375,0.5599 -2.87996,0.24845 -3.90527,-0.77686l-32.25,-32.25c-1.39974,-1.39974 -1.39974,-3.66732 0,-5.06706z"></path></g></g></svg> <b>Volver</b></a>
                    </div>
            </div>
        </div>
    </div>
     <div class="col-md col-xl-4">
        <h3 class="text-center">Detalle</h3>
    </div>
    <div class="col-md col-xl-4">
    </div>
</div>
@foreach ($arrayMisCursos as $item)
<div class="container my-3">
    <div class="card border-danger">
        <div class="row no-gutters">
            <div class="col-md-6">
                <img src="data:image/png;base64,{{$item->Imagen}}" alt="" class="card-img h-100 w-100">
            </div>
            <div class="col-md-6">
                <div class="card-header bg-color4 border-danger text-center">
                    <h3 class="color4">{{$item->Curso}}</h3>
                </div>
                <div class="card-body">
                    <h4 class="card-text"><b>Comisión: </b>
                      @if ($item->Comision=="")
                          "No definido"
                      @else
                      {{$item->Comision}}.
                      @endif
                    </h4>
                    <h4 class="card-text"><b>Turno: </b>
                        @if ($item->Turno=="")
                            "No definido"
                        @else
                            {{$item->Turno}}.
                        @endif
                    </h4>
                    <h4 class="card-text"><b>Horario: </b>
                        @if ($item->Horario=="")
                          "No definido"
                        @else
                            {{$item->Horario}}.
                        @endif
                    </h4>
                    <h4 class="card-text"><b>Modalidad: </b>
                        {{$item->M}}.
                    </h4>
                    <h4 class="card-text"><b>Duración: </b>
                        {{$item->Duracion}}.
                    </h4>
                    <h4 class="card-text"><b>Precio: $ </b>
                        {{$item->Precio}}.
                    </h4>
                    <h4 class="card-text"><b>Deuda: </b>
                        @if ($item->Deuda==0)
                            PAGADO!
                        @else
                            $ {{$item->Deuda}}.
                    @endif
                    </h4>
                </div>
                <div class="card-footer border-danger text-center bg-color4">
                    <h4 class="card-text color4">
                        @if ($item->Estado==0)
                        <form action="{{ route('Mis_Cursos.destroy', $item->idCursoXEstudiante) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button href="#" type="submit" class="btn btn-outline-light"><b>Darse de Baja</b></button>
                        </form>
                        @else
                        <b>Estado: INSCRIPTO!</b>
                        @endif
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@include('Libs.Footer')
@include('Libs.Finally')
