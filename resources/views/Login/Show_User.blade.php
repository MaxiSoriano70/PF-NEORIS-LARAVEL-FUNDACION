@include('Libs.Header')
@if (session()->get('idtipo')==3)
<div class="row mt-3 align-items-center">
    <div class="col-md col-xl-4">
        <div class="container my-3">
            <div class="row">
                    <div class="col text-center">
                        <a href="{{route('Welcome.index')}}" type="button" class="btn btn-secondary mx-2"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="25" height="25" viewBox="0 0 172 172"
                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,172c47.41968,0 86,-38.58032 86,-86c0,-47.41968 -38.58032,-86 -86,-86c-47.41968,0 -86,38.58032 -86,86c0,47.41968 38.58032,86 86,86zM36.88314,83.46647l32.25,-32.25c0.68587,-0.68587 1.6027,-1.0498 2.53353,-1.0498c0.46191,0 0.92733,0.08748 1.37175,0.27295c1.34025,0.5529 2.21159,1.86165 2.21159,3.31038v7.16667c0,0.95182 -0.37793,1.86165 -1.0498,2.53353l-15.38314,15.38314h73.76628c1.98063,0 3.58333,1.6027 3.58333,3.58333v7.16667c0,1.98063 -1.6027,3.58333 -3.58333,3.58333h-73.76628l15.38314,15.38314c0.67187,0.67188 1.0498,1.58171 1.0498,2.53353v7.16667c0,1.44873 -0.87134,2.75749 -2.21159,3.31038c-1.34375,0.5599 -2.87996,0.24845 -3.90527,-0.77686l-32.25,-32.25c-1.39974,-1.39974 -1.39974,-3.66732 0,-5.06706z"></path></g></g></svg> <b>Volver</b></a>
                    </div>
            </div>
        </div>
    </div>
@foreach ($arrayUser as $item)
    <div class="col-md col-xl-4">
        <h1 class="text-center"><b>{{$item->Nombre}} {{$item->Apellido}}</b></h1>
    </div>
    <div class="col-md col-xl-4">
    </div>
</div>
<div class="row mt-3 align-items-center">
    <div class="col-md col-xl-4">
        <div class="box-image d-flex justify-content-center align-items-center mt-4 mt-md-0">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="70%" height="70%" viewBox="0 0 172 172" style="fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><g><circle cx="256" cy="256" transform="scale(0.33594,0.33594)" r="245" fill="#9a2128"></circle><circle cx="256" cy="198.799" transform="scale(0.33594,0.33594)" r="88.026" fill="#ffffff"></circle><rect x="131.873" y="307.569" transform="scale(0.33594,0.33594)" width="248.254" height="93.657" rx="46.829" ry="46.8285" fill="#ffffff"></rect><path d="M111.72415,164.20427c-8.30144,2.72698 -16.98488,4.11166 -25.72273,4.1018c-45.4557,0 -82.30469,-36.84898 -82.30469,-82.30469c-0.02987,-19.26004 6.72456,-37.91529 19.07789,-52.6918c6.02003,56.95145 40.49727,105.41379 88.94953,130.89469z" fill="#9a2128"></path><path d="M71.59977,134.78619h-11.56633c-6.36253,-0.00023 -12.09856,-3.83274 -14.53388,-9.71074c-2.43532,-5.87801 -1.09044,-12.6442 3.40763,-17.1441c0.13102,-0.13102 0.26539,-0.26203 0.40312,-0.38633c6.45968,9.83271 13.93015,18.96278 22.28945,27.24117z" fill="#ffffff"></path></g></g></g></svg>
        </div>
    </div>
    <div class="col-md col-xl-8">
        <div class="card border-danger">
            <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">DATOS PERSONALES</h4></div>
            <div class="card-body">
              <h4 class="card-title">Nombre: {{$item->Nombre}}.</h4>
              <h4 class="card-title">Apellido: {{$item->Apellido}}.</h4>
              <h4 class="card-title">Dni: {{$item->Dni}}.</h4>
              <h4 class="card-title">Email: {{$item->Email}}.</h4>
              <h4 class="card-title">Telefono:
                @if ($item->Codigo_Area=="" || $item->Telefono=="")
                 No definido
                @else
                 {{$item->Codigo_Area}}-{{$item->Telefono}}
                @endif
                .</h4>
              <h4 class="card-title">Fecha de Nacimiento:
                @if ($item->Fecha_Nacimiento=="")
                 No definido
                @else
                 {{$item->Fecha_Nacimiento}}
                @endif
                .</h4>
              <h4 class="card-title">Dirección:
                @if ($item->Direccion=="")
                 No definido
                @else
                 {{$item->Direccion}}
                @endif
                .</h4>
            </div>
            <div class="card-footer border-danger text-center bg-color4">
                <a href="{{route('Login.edit', $item->idEstudiante)}}" type="button" class="btn btn-outline-light"><b>Actualizar Datos</b></a>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
    <h1>NO ERES UN ESTUDIANTE</h1>
@endif
@include('Libs.Footer')
@include('Libs.Finally')
