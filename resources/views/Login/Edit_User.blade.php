@include('Libs.Header')
<div class="row mt-5">
    <div class="d-flex justify-content-center">
        <h1>Actualiza tus Datos Personales</h1>
    </div>
</div>
<div class="row mt-5">
  <div class="d-flex justify-content-center">
    @foreach ($arrayEstudiante as $item)
    <form class="mt-3 w-50 needs-validation" novalidate method="post" action="{{route('Login.update',$item->idEstudiante);}}">
    @csrf
    @method("PUT")
    <div class="mb-3">
        <label class="form-label" for="Nombre">*Nombre</label>
        <input name="Nombre" type="text" class="form-control" id="Nombre" value="{{$item->Nombre}}" required>
        @if ($errors->has('Nombre'))
          <div>*El campo Nombre no puede se null</div><br>
        @endif
      </div>
    <div class="mb-3">
        <label class="form-label" for="Apellido">*Apellido</label>
        <input name="Apellido" type="text" class="form-control" id="Apellido" value="{{$item->Apellido}}" required>
        @if ($errors->has('Apellido'))
          <div>*El campo Direecion no puede se null</div><br>
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label" for="Dni">*Dni</label>
        <input name="Dni" type="number" class="form-control" id="Dni" value="{{$item->Dni}}" required>
        @if ($errors->has('Dni'))
          <div>*El campo DNI no puede se null</div><br>
        @endif
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">*Email</label>
      <input name="Email" type="email" class="form-control" id="exampleInputEmail1" value="{{$item->Email}}" aria-describedby="emailHelp" required>
      @if ($errors->has('Email'))
        <div>*El campo Email no puede se null y tiene que tener la siguiente estructura "example@example.com"</div><br>
      @endif
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">*Contraseña</label>
      <input name="Clave" type="password" class="form-control" id="exampleInputPassword1" value="{{$item->Clave}}" required>
      @if ($errors->has('Clave'))
        <div>*El campo Contraseña no puede se null"</div><br>
      @endif
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">*Confirmar Contraseña</label>
        <input name="Clave_c" type="password" class="form-control" id="exampleInputPassword1" value="{{$item->Clave}}" required>
        @if ($errors->has('Clave_c'))
          <div>*La contraseñas no coinciden</div><br>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">Codigo de Area</label>
        <input name="Codigo_Area" type="number" class="form-control" value="{{$item->Codigo_Area}}" id="Codigo_Area">
      </div>
    <div class="mb-3">
        <label class="form-label">Telefono</label>
        <input name="Telefono" type="number" class="form-control" id="Telefono" value="{{$item->Telefono}}">
      </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Nacimiento</label>
        <input name="Fecha_nacimiento" type="date" class="form-control" id="FechadeNacimiento" value="{{$item->Fecha_Nacimiento}}">
      </div>
    <div class="mb-3">
        <label class="form-label">Direccion</label>
        <input name="Direccion" type="text" class="form-control" id="Direccion" value="{{$item->Direccion}}">
      </div>
    <div id="emailHelp" class="form-text my-3">Los campos con * son abligatorios.</div>
    <!-- BOTONES -->
    <a href="{{route('Login.show',$item->idEstudiante)}}" type="button" class="btn btn-secondary mx-2"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
        width="25" height="25"
        viewBox="0 0 172 172"
        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,172c47.41968,0 86,-38.58032 86,-86c0,-47.41968 -38.58032,-86 -86,-86c-47.41968,0 -86,38.58032 -86,86c0,47.41968 38.58032,86 86,86zM36.88314,83.46647l32.25,-32.25c0.68587,-0.68587 1.6027,-1.0498 2.53353,-1.0498c0.46191,0 0.92733,0.08748 1.37175,0.27295c1.34025,0.5529 2.21159,1.86165 2.21159,3.31038v7.16667c0,0.95182 -0.37793,1.86165 -1.0498,2.53353l-15.38314,15.38314h73.76628c1.98063,0 3.58333,1.6027 3.58333,3.58333v7.16667c0,1.98063 -1.6027,3.58333 -3.58333,3.58333h-73.76628l15.38314,15.38314c0.67187,0.67188 1.0498,1.58171 1.0498,2.53353v7.16667c0,1.44873 -0.87134,2.75749 -2.21159,3.31038c-1.34375,0.5599 -2.87996,0.24845 -3.90527,-0.77686l-32.25,-32.25c-1.39974,-1.39974 -1.39974,-3.66732 0,-5.06706z"></path></g></g></svg> <b>Volver</b></a>
    <button type="submit" class="btn btn-success mx-2"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
      width="25" height="25"
      viewBox="0 0 172 172"
      style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,17.2c-37.9948,0 -68.8,30.8052 -68.8,68.8c0,37.9948 30.8052,68.8 68.8,68.8c37.9948,0 68.8,-30.8052 68.8,-68.8c0,-37.9948 -30.8052,-68.8 -68.8,-68.8zM124.45347,72.85347l-43.344,43.344c-1.07787,1.07787 -2.53413,1.67987 -4.05347,1.67987c-1.51933,0 -2.98133,-0.602 -4.05347,-1.67987l-19.7972,-19.7972c-2.24173,-2.24173 -2.24173,-5.8652 0,-8.10693c2.24173,-2.24173 5.8652,-2.24173 8.10693,0l15.74373,15.74373l39.29053,-39.29053c2.24173,-2.24173 5.8652,-2.24173 8.10693,0c2.24173,2.24173 2.24173,5.8652 0,8.10693z"></path></g></g></svg> <b>Guardar Cambios</b></button>
  </form>
  @endforeach
  </div>
</div>
@include('Libs.Footer')
@include('Libs.Finally')
