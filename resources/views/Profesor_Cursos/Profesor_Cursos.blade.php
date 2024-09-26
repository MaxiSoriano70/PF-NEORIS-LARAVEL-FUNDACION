@include('Libs.Header')
@if (session()->get('id')==1)
<div class="container my-3">
    <h1 class="text-center">Profesores X Cursos</h1>
</div>
<div class="container my-3">
    <div class="row">
            <div class="col text-center">
            <a href="{{route('Profesor_Cursos.create')}}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="25" height="25"
                viewBox="0 0 172 172"
                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,14.33333c-39.5815,0 -71.66667,32.08517 -71.66667,71.66667c0,39.5815 32.08517,71.66667 71.66667,71.66667c39.5815,0 71.66667,-32.08517 71.66667,-71.66667c0,-39.5815 -32.08517,-71.66667 -71.66667,-71.66667zM121.83333,93.16667h-28.66667v28.66667h-14.33333v-28.66667h-28.66667v-14.33333h28.66667v-28.66667h14.33333v28.66667h28.66667z"></path></g></g></svg>
                 <b style="font-size:20px">Agregar</b></a>
            </div>
    </div>
</div>
<div class="row mt-3 align-items-center">
    <div class="col-md col-xl-4">
        @include('Libs.Volver')
    </div>
     <div class="col-md col-xl-4">
        <h3 class="text-center">Tabla de tus Profesores X Cursos</h3>
    </div>
    <div class="col-md col-xl-4">
    </div>
</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre y Apellido</th>
            <th>Dni</th>
            <th>Curso</th>
            <th>Comisión</th>
            <th>Turno</th>
            <th>Modalidad</th>
            <th>Detalle</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($arrayProfesor_Cursos as $dato)
                        <tr>
                            <td>{{$dato->idPersonalXCurso}}</td>
                            <td>{{$dato->Nombre}} {{$dato->Apellido}}</td>
                            <td>{{$dato->Dni}}</td>
                            <td>{{$dato->Curso}}</td>
                            <td>{{$dato->Comision}}</td>
                            <td>
                                @if ($dato->Turno=="")
                                    No Definido.
                                @else
                                    {{$dato->Turno}}
                                @endif
                            </td>
                            <td>
                                @if ($dato->Modalidad=="")
                                    No Definido.
                                @else
                                    {{$dato->Modalidad}}
                                @endif
                            </td>
                            <td>
                                <a href="{{route('Profesor_Cursos.show', $dato->idPersonalXCurso)}}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    width="25" height="25"
                                    viewBox="0 0 172 172"
                                    style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M32.25,16.125v26.875h-5.375v10.75h16.125v-10.75v-16.125h86v61.47656c3.40238,-1.20938 7.00363,-1.96784 10.75,-2.21509v-70.01148zM86,48.375c-11.81046,0 -21.5,9.68954 -21.5,21.5c0,6.00113 2.5193,11.43512 6.52979,15.34815c-7.16381,4.84556 -11.90479,13.04552 -11.90479,22.27685h10.75c0,-8.89318 7.23182,-16.125 16.125,-16.125c8.89318,0 16.125,7.23182 16.125,16.125h10.75c0,-9.23134 -4.74098,-17.43129 -11.90479,-22.27685c4.01049,-3.91303 6.52979,-9.34702 6.52979,-15.34815c0,-11.81046 -9.68954,-21.5 -21.5,-21.5zM32.25,59.125v10.75h-5.375v10.75h16.125v-10.75v-10.75zM86,59.125c6.00073,0 10.75,4.74927 10.75,10.75c0,6.00073 -4.74927,10.75 -10.75,10.75c-6.00073,0 -10.75,-4.74927 -10.75,-10.75c0,-6.00073 4.74927,-10.75 10.75,-10.75zM32.25,86v10.75h-5.375v10.75h16.125v-10.75v-10.75zM142.4375,96.75c-16.125,0 -29.5625,13.4375 -29.5625,29.5625c0,6.45 2.15,11.8229 5.375,16.6604l-19.8833,19.8938l7.5166,7.5166l19.8938,-19.8833c4.8375,3.225 10.7479,5.375 16.6604,5.375c16.125,0 29.5625,-13.4375 29.5625,-29.5625c0,-16.125 -13.4375,-29.5625 -29.5625,-29.5625zM142.4375,107.5c10.2125,0 18.8125,8.6 18.8125,18.8125c0,10.2125 -8.6,18.8125 -18.8125,18.8125c-10.2125,0 -18.8125,-8.6 -18.8125,-18.8125c0,-10.2125 8.6,-18.8125 18.8125,-18.8125zM32.25,118.25v26.875h74.55713c-1.76838,-3.33787 -3.0944,-6.9445 -3.87378,-10.75h-59.93335v-16.125z"></path></g></g></svg>
                                     <b>Detalle</b></a>
                            </td>
                            <td>
                                <a href="{{route('Profesor_Cursos.edit', $dato->idPersonalXCurso)}}" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    width="25" height="25"
                                    viewBox="0 0 172 172"
                                    style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M138.52092,66.42067l8.74333,-8.74333c9.08017,-9.08017 9.08017,-23.85783 0,-32.94158c-4.39675,-4.39317 -10.24117,-6.80833 -16.47258,-6.80833c-6.23142,0 -12.07942,2.41875 -16.47258,6.81192l-8.73975,8.73975zM97.97908,41.07933l-64.74725,64.74725c-1.37958,1.37958 -2.4295,3.08167 -3.03867,4.92708l-12.00417,36.26692c-0.64142,1.92783 -0.13617,4.05275 1.30075,5.48967c1.02842,1.02483 2.39725,1.57308 3.80192,1.57308c0.56617,0 1.13592,-0.08958 1.69133,-0.27233l36.25617,-12.00775c1.85258,-0.60917 3.55825,-1.65908 4.93783,-3.04225l64.74367,-64.74367z"></path></g></g></svg> <b>Editar</b></a>
                            </td>
                            <td>
                                <form action="{{ route('Profesor_Cursos.destroy', $dato->idPersonalXCurso) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        width="25" height="25"
                                        viewBox="0 0 172 172"
                                        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M85.91042,14.25495c-3.16203,0.04943 -5.68705,2.6496 -5.64375,5.81172v2.86667h-31.53333c-1.53406,-0.02082 -3.01249,0.574 -4.10468,1.65146c-1.09219,1.07746 -1.70703,2.54767 -1.70704,4.08187h-8.52161c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h103.2c2.06765,0.02924 3.99087,-1.05709 5.03322,-2.843c1.04236,-1.78592 1.04236,-3.99474 0,-5.78066c-1.04236,-1.78592 -2.96558,-2.87225 -5.03322,-2.843h-8.52161c-0.00001,-1.53421 -0.61486,-3.00442 -1.70704,-4.08187c-1.09219,-1.07746 -2.57061,-1.67228 -4.10468,-1.65146h-31.53333v-2.86667c0.02122,-1.54972 -0.58581,-3.04203 -1.68279,-4.1369c-1.09698,-1.09487 -2.59045,-1.69903 -4.14013,-1.67482zM34.4,51.6l10.27969,87.34375c0.67653,5.77347 5.56348,10.12292 11.37708,10.12292h59.88646c5.8136,0 10.69482,-4.34945 11.37708,-10.12292l10.27969,-87.34375z"></path></g></g></svg> <b>Eliminar</b></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre y Apellido</th>
            <th>Dni</th>
            <th>Curso</th>
            <th>Comisión</th>
            <th>Turno</th>
            <th>Modalidad</th>
            <th>Detalle</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </tfoot>
</table>
@else
@include('Carteles.Acceso_negado')
@endif
@include('Libs.Footer')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@include('Libs.Finally')
