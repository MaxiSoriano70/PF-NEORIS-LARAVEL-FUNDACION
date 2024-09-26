@include('Libs.Header')
<div class="container my-3">
    <h1 class="text-center">LOGIN</h1>
</div>
<div class="row mt-5">
<div class="d-flex justify-content-center">
<form method="POST" action="{{ route('Login.diferenciar'); }}">
    @csrf
    <div class="mb-3">
      <label  for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" name="Correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Nunca compartas tu Email con nadie.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Contaseña</label>
      <input type="password" name="Clave" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary mx-2">Ingresar</button>
    <a href="{{route('Login.create');}}" type="button" class="btn btn-success mx-2">Registrarse</a>
  </form>
</div>
</div>
  @include('Libs.Footer')
  @include('Libs.Finally')
