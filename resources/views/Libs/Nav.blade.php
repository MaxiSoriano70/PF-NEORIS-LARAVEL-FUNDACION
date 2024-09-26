<nav class="navbar navbar-expand-lg navbar-dark bg-color1 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('Welcome.index');}}"><img src="{{ URL::to('/assets/img/Logo.png') }}" style="width: 35px; height: 35px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><b><a class="nav-link active" aria-current="page" href="#">INI Computación</a></b></li>
                <li class="nav-item"><b><a class="nav-link" href="#Cursos">Cursos</a></b></li>

                @if (session()->get('id'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><b>{{ session()->get('nombre'); }} {{ session()->get('apellido'); }}</b></a>
                    <ul class="dropdown-menu dropdown-menu-end bg-color2" aria-labelledby="navbarDropdown">
                        @if (session()->get('id')==1)
                        <li><a class="dropdown-item" href="{{route('Administrar.index');}}"><b>Administrar</b></a></li>
                        <li><a class="dropdown-item" href="#"><b>Gestionar Cobros</b></a></li>
                        @else
                        <li><a class="dropdown-item" href="{{route('Login.show', session()->get('id'))}}"><b>Datos Personales</a></b></li>
                        <li><a class="dropdown-item" href="{{route('Mis_Cursos.index', session()->get('id'))}}"><b>Mis cursos</a></b></li>
                        @endif
                        <li></b><hr class="dropdown-divider" /></b></li>
                        <li><form action="{{ route('Login.destroy', session()->get('id')) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="dropdown-item"><b>Cerrar sesión</b></button>
                        </li>
                        </form>
                    </ul>
                </li>
                @else
                <li class="nav-item"><b><a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Iniciar Sesión</a></b></li>
                <li class="nav-item"><b><a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal1">Registrarse</a></b></li>
                <li class="nav-item"><b><a class="nav-link" href="{{route('Login.create');}}">Registrarse</a></b></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="row mb-5">

</div>
<div class="row mb-1">

</div>
<div class="info">
	<div class="entrega">
		<i class="fas fa-shipping-fast"></i><b>CURSOS VIRTUALES Y PRESENCIALES</b>
	</div>
	<div class="productos">
		<i class="fas fa-tshirt"></i><b>CLASES PERSONALIZADAS</b>
	</div>
	<div class="contacto">
		<i class="fas fa-phone-alt"></i><b>CONTACTANOS +39 02.26303235</b>
	</div>
</div>

