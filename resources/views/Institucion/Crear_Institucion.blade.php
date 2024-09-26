@if (session()->get('id')==1)
@if ($errors->has('Nombre'))
    <div>*El campo Nombre no puede se null</div><br>

@endif
@if ($errors->has('Direccion'))
    <div>*El campo Direecion no puede se null</div><br>

@endif
@if ($errors->has('Telefono'))
    <div>*El campo Telefono no puede se null</div><br>

@endif
@if ($errors->has('Email'))
    <div>*El campo Email no puede se null y tiene que tener la siguiente estructura "example@example.com"</div><br>

@endif
<title>{{$Titulo}}</title>
    <form method="POST" action="{{ route('Institucion.store'); }}">
        @csrf
        <label for="">Nombre: </label><br>
            <input name="Nombre" type="text"><br>
        <label for="">Direccion: </label><br>
            <input name="Direccion" type="text"><br>
        <label for="">Telefono: </label><br>
            <input name="Telefono" type="text"><br>
        <label for="">Email: </label><br>
            <input name="Email" type="text"><br>
        <label for="">Facebook: </label><br>
            <input name="Facebook" type="text"><br>
        <label for="">Instragram: </label><br>
            <input name="Instragram" type="text"><br>
        <label for="">Twitter: </label><br>
            <input name="Twitter" type="text"><br>
        <label for="">Linkedin: </label><br>
            <input name="Linkedin" type="text"><br>
        <label for="">Mision: </label><br>
            <input name="Mision" type="text"><br>
        <label for="">Vision: </label><br>
            <input name="Vision" type="text"><br>
        <button type="submit">Crear</button>
    </form>
    @else
@include('Carteles.Acceso_negado')
@endif
