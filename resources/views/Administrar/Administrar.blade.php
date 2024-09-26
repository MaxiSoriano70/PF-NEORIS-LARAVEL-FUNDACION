@include('Libs.Header')
@if (session()->get('id')==1)
<div class="row mt-5">
    <div class="d-flex justify-content-center">
        <h1>Bienvenido {{session()->get('nombre')}} {{session()->get('apellido')}}</h1>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 my-3">
    <div class="col">
      <div class="card border-danger h-100">
        <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">INSTITUCIÓN</h4></div>
        <div class="card-body">
            <h5 class="card-title text-center">Card title</h5>
            <p class="card-text text-center">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer border-danger text-center bg-color4">
            <a href="{{route('Institucion.index');}}" type="button" class="btn btn-outline-light"><b>Administrar</b></a>
        </div>
      </div>
    </div>
    <div class="col">
        <div class="card border-danger h-100">
          <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">PERSONAL</h4></div>
          <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
              <p class="card-text text-center">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer border-danger text-center bg-color4">
              <a href="{{route('Personal.index');}}" type="button" class="btn btn-outline-light"><b>Administrar</b></a>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger h-100">
          <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">PROFESORES x CURSOS</h4></div>
          <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
              <p class="card-text text-center">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer border-danger text-center bg-color4">
              <a href="{{route('Profesor_Cursos.index');}}" type="button" class="btn btn-outline-light"><b>Administrar</b></a>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger h-100">
          <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">ESTUDIANTES</h4></div>
          <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
              <p class="card-text text-center">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer border-danger text-center bg-color4">
              <a href="{{route('Estudiantes.index');}}" type="button" class="btn btn-outline-light"><b>Administrar</b></a>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger h-100">
          <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">ESTUDIANTES x CURSOS</h4></div>
          <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
              <p class="card-text text-center">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer border-danger text-center bg-color4">
              <a href="{{route('Estudiantes_Cursos.index');}}" type="button" class="btn btn-outline-light"><b>Administrar</b></a>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger h-100">
          <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">CURSOS APROBADOS</h4></div>
          <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
              <p class="card-text text-center">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer border-danger text-center bg-color4">
              <a href="{{route('Cursos_Tipos.index');}}" type="button" class="btn btn-outline-light"><b>Administrar</b></a>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger h-100">
          <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">CURSOS</h4></div>
          <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
              <p class="card-text text-center">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer border-danger text-center bg-color4">
              <a href="{{route('Cursos.index');}}" type="button" class="btn btn-outline-light"><b>Administrar</b></a>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger h-100">
          <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">CATEGORIAS CURSOS</h4></div>
          <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
              <p class="card-text text-center">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer border-danger text-center bg-color4">
              <a href="{{route('Categorias.index');}}" type="button" class="btn btn-outline-light"><b>Administrar</b></a>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger h-100">
          <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">MODALIDAD DE CURSOS</h4></div>
          <div class="card-body">
              <h5 class="card-title text-center">Card title</h5>
              <p class="card-text text-center">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer border-danger text-center bg-color4">
              <a href="{{route('TiposCursos.index');}}" type="button" class="btn btn-outline-light"><b>Administrar</b></a>
          </div>
        </div>
    </div>
</div>

@else
@include('Carteles.Acceso_negado')
@endif
@include('Libs.Footer')
@include('Libs.Finally')
