@include('Libs.Header')
@if (session()->get('id')==1)
<h1>Hola soy el show</h1>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Institucion</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Facebook</th>
            <th>Instragram</th>
            <th>Twitter</th>
            <th>Linkedin</th>
            <th>Mision</th>
            <th>Vision</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($arrayInstitucion as $dato)
            <tr>
                <td>{{$dato->idInstitucion}}</td>
                <td>{{$dato->Nombre}}</td>
                <td>{{$dato->Direccion}}</td>
                <td>{{$dato->Telefono}}</td>
                <td>{{$dato->Email}}</td>
                <td>
                    @if($dato->Facebook=="")
                        No definido.
                    @else
                        {{$dato->Facebook}}
                    @endif
                </td>
                <td>
                    @if($dato->Instragram=="")
                        No definido.
                    @else
                        {{$dato->Instragram}}
                    @endif
                </td>
                <td>
                    @if($dato->Twitter=="")
                        No definido.
                    @else
                        {{$dato->Twitter}}
                    @endif
                </td>
                <td>
                    @if($dato->Linkedin=="")
                        No definido.
                    @else
                        {{$dato->Linkedin}}
                    @endif
                </td>
                <td>
                    @if($dato->Mision=="")
                        No definido.
                    @else
                        {{$dato->Mision}}
                    @endif
                </td>
                <td>
                    @if($dato->Vision=="")
                        No definido.
                    @else
                        {{$dato->Vision}}
                    @endif
                </td>
                <td>
                    <a href="{{route('Institucion.edit', $dato->idInstitucion)}}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
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
@include('Libs.Finally)
