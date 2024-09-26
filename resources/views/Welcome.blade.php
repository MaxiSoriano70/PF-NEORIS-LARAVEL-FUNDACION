@include('Libs.Header')
<div class="row">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ URL::to('/assets/img/Banner_1.png') }}" class="d-block w-100" alt="..." style="
        height:500px;">
        <div class="carousel-caption d-none d-md-block" style="text-shadow: -2px -4px 50px rgba(0,0,0,1);">
          <h3>Aprende Ofimatica</h3>
          <h5>Ahora con INI Computación puedes aprender a manejar programas de ofimatica.</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ URL::to('/assets/img/Banner_2.png') }}" class="d-block w-100" alt="..." style="height:500px;">
        <div class="carousel-caption d-none d-md-block" style="text-shadow: -2px -4px 50px rgba(0,0,0,1);">
          <h3>Convertite en Full Stack Developér</h3>
          <h5>INI computación tiene para vos un curso completo de Programación Web.</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ URL::to('/assets/img/Banner_3.png') }}" class="d-block w-100" alt="..." style="height:500px;">
        <div class="carousel-caption d-none d-md-block" style="text-shadow: -2px -4px 50px rgba(0,0,0,1);">
          <h3>¿Queres aprende a manejar Datos?</h3>
          <h5>Con INI Computación aprenderas a manejar diferentes bases de datos.</h5>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<div class="row my-3">
    <div class="d-flex justify-content-center">
        <h2>BIENVENIDOS A INI COMPUTACIÓN</h2>
    </div>
</div>
</div>
<div style="width: 100%;height:100%;">
    @include('Libs.Categorias')
</div>
<div class="container-md">
<div class="row my-3" id="Cursos"></div>
    <div class="d-flex justify-content-center">
        <h2>CURSOS</h2>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach ($arrayWelcome as $item)
    <div class="col">
      <div class="card">
        <img src="data:image/png;base64,{{$item->Imagen}}" class="card-img-top" alt="...">
        <div class="card-header bg-color4 border-danger text-center"><h4 class="color4">{{$item->Curso}}</h4></div>
        <div class="card-body">
          <h4 class="card-title text-center">Descripcion</h4>
          <p class="card-text">
            @if ($item->Descripcion=="")
              "Sin Descripcion"
            @else
              {{$item->Descripcion}}
            @endif
          </p>
          <h5 class="card-text"><b>Precio: </b>
            @if ($item->Precio=="")
              "No definido"
            @else
              {{$item->Precio}}
            @endif
          </h5>
          <h5 class="card-text"><b>Modalidad: </b>
            {{$item->M}}
          </h5>
          <h5 class="card-text"><b>Fecha de Inicio: </b>
            @if ($item->Fecha_de_Inicio=="")
              "No definido"
            @else
              {{$item->Fecha_de_Inicio}}
            @endif
          </h5>
        </div>
        <div class="card-footer border-danger text-center bg-color4">
            <a href="{{route('Welcome.show', $item->idCursoXTipo)}}" type="button" class="btn btn-outline-light"><b>Detalle</b></a>
        </div>
      </div>
    </div>
    @endforeach
</div>
<div class="row my-5">
    <div class="d-flex justify-content-center">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d673.5215249349906!2d-65.41518245378414!3d-24.787493479918638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x941bc3ba60400ea9%3A0x9ed0011f055584f6!2sIni%20Capacitaci%C3%B3n%20Profesional!5e0!3m2!1ses-419!2sar!4v1640671424683!5m2!1ses-419!2sar" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>





<!-- Modal Login-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-color1 color1">
          <h5 class="modal-title" id="exampleModalLabel"><img src="{{ URL::to('/assets/img/Logo.png') }}" style="width: 30px; height: 30px;"> INI Computación</h5>
          <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
            <div class="container-lg mb-3">
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="100" height="100"
                        viewBox="0 0 172 172"
                        style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><g><path d="M168.30469,138.30547c0.00029,5.11688 -2.03225,10.02428 -5.65043,13.64246c-3.61818,3.61818 -8.52558,5.65073 -13.64246,5.65043h-78.74039l17.34109,-25.33641c1.52516,-2.22871 1.52516,-5.16527 0,-7.39398l-22.61195,-33.03609c-0.10078,-0.14781 -0.20492,-0.28555 -0.31242,-0.41992c2.21701,-0.7291 4.48376,-1.2972 6.78258,-1.69984c16.70021,12.20569 39.37784,12.20569 56.07805,0c23.5726,4.16968 40.75378,24.65482 40.75594,48.59336z" fill="#9a2128"></path><path d="M53.05461,97.00195v14.17992h-14.21688c1.83887,-2.79637 3.95843,-5.39769 6.3257,-7.76352c2.40399,-2.40309 5.04823,-4.55315 7.89117,-6.41641z" fill="#9a2128"></path><circle cx="296.216" cy="152.871" transform="scale(0.33594,0.33594)" r="141.434" fill="#9a2128"></circle><path d="M53.05316,95.52796v15.65361h-31.97574c-4.61003,-0.00001 -9.03124,1.83131 -12.29102,5.09109c-3.25978,3.25978 -5.0911,7.68099 -5.09109,12.29102v0c0,9.59988 7.78224,17.38211 17.38211,17.38211h31.97574v15.65358c0,6.43576 8.31355,9.00826 11.94839,3.69723l22.60933,-33.03569c1.52539,-2.22881 1.52539,-5.16564 0,-7.39445l-22.60933,-33.03572c-3.63484,-5.311 -11.94839,-2.7385 -11.94839,3.69723z" fill="#9a2128"></path><path d="M106.12602,157.59836h-35.85461l11.30094,-16.51133c7.68266,6.21569 15.89912,11.74092 24.55367,16.51133z" fill="#9a2128"></path><path d="M53.05461,145.94469v11.65367h-3.04695c-7.70388,0.00204 -14.67044,-4.57938 -17.7207,-11.65367z" fill="#9a2128"></path><path d="M52.72203,111.18188h-13.8843c1.83887,-2.79637 3.95843,-5.39769 6.3257,-7.76352c0.4132,-0.4132 0.83648,-0.81969 1.26312,-1.21273c2.00219,3.06375 4.10068,6.05583 6.29547,8.97625z" fill="#9a2128"></path><path d="M81.57234,141.08703l-16.5718,24.21102c-3.63484,5.31117 -11.94594,2.73789 -11.94594,-3.69867v-15.65469h-31.97789c-9.59949,0 -17.38141,-7.78192 -17.38141,-17.38141c0,-9.59949 7.78192,-17.38141 17.38141,-17.38141h31.64531c8.34912,11.11795 18.03922,21.16234 28.85031,29.90516z" fill="#9a2128"></path><path d="M149.0118,159.61398h-78.74039c-0.74775,0 -1.43406,-0.41396 -1.78287,-1.07537c-0.34881,-0.66141 -0.30281,-1.46157 0.11951,-2.07865l17.34109,-25.33641c1.06343,-1.53981 1.06356,-3.57688 0.00034,-5.11683l-22.61195,-33.03636c-0.07317,-0.10726 -0.14691,-0.20405 -0.22259,-0.29851c-0.41291,-0.51571 -0.54689,-1.20104 -0.35859,-1.83428c0.1883,-0.63325 0.67497,-1.13402 1.30257,-1.34033c2.3093,-0.75889 4.67022,-1.35061 7.06446,-1.77059c0.54058,-0.09481 1.09644,0.03501 1.5391,0.35945c15.99092,11.68605 37.70429,11.68605 53.69521,0c0.44276,-0.32474 0.99893,-0.45458 1.5397,-0.35945c24.53655,4.3391 42.42073,25.66155 42.42293,50.57882c0.00019,5.65143 -2.24475,11.07144 -6.24091,15.0676c-3.99616,3.99616 -9.41618,6.2411 -15.0676,6.24091zM74.09364,155.58273h74.91816c4.58231,0.0003 8.97702,-1.81988 12.21721,-5.06006c3.24018,-3.24018 5.06036,-7.6349 5.06006,-12.21721c0.04703,-22.66025 -16.0115,-42.15826 -38.26063,-46.45542c-17.10544,12.04255 -39.93174,12.04255 -57.03718,0c-1.02374,0.19881 -2.04458,0.43269 -3.05609,0.70073l21.34056,31.17886c2.00997,2.90994 2.01019,6.75985 0.00057,9.67003z" fill="#000000"></path><path d="M53.05461,159.61398h-3.04695c-8.50956,0.00549 -16.20543,-5.05556 -19.57172,-12.87098c-0.26864,-0.62292 -0.20591,-1.33919 0.16691,-1.90593c0.37282,-0.56674 1.00573,-0.90793 1.6841,-0.90788h20.76766c1.1132,0 2.01563,0.90243 2.01563,2.01563v11.65367c-0.00007,1.11315 -0.90248,2.01549 -2.01562,2.01549zM35.6732,147.96031c3.21138,4.76857 8.58535,7.62621 14.33445,7.62242h1.03133v-7.62242z" fill="#000000"></path><path d="M53.05461,113.1975h-14.21688c-0.74096,0.00002 -1.42219,-0.40651 -1.77399,-1.05863c-0.3518,-0.65212 -0.31744,-1.44468 0.08947,-2.06391c3.87102,-5.87951 8.90684,-10.90255 14.79617,-14.75861c0.61933,-0.40609 1.41148,-0.43984 2.0631,-0.08789c0.65163,0.35195 1.05776,1.0329 1.05776,1.77349v14.17992c0,1.1132 -0.90243,2.01563 -2.01562,2.01563zM42.76333,109.16625h8.27565v-8.24821c-3.08807,2.39767 -5.8677,5.1681 -8.27559,8.24821z" fill="#000000"></path><path d="M99.51141,100.88203c-24.09601,-0.00008 -44.69736,-17.33762 -48.81283,-41.07958c-0.18861,-1.09712 0.54788,-2.13942 1.645,-2.32803c1.09712,-0.18861 2.13942,0.54788 2.32803,1.645c3.72848,21.83868 22.6852,37.79019 44.8398,37.73136c25.08654,0 45.49602,-20.40951 45.49602,-45.49602c0,-25.0865 -20.40948,-45.49602 -45.49602,-45.49602c-21.62221,0 -40.38533,15.36242 -44.61458,36.52847c-0.21815,1.09164 -1.27994,1.79974 -2.37158,1.58159c-1.09164,-0.21815 -1.79974,-1.27994 -1.58159,-2.37158c4.60463,-23.04424 25.0303,-39.76973 48.56776,-39.76973c27.30943,0 49.52727,22.21783 49.52727,49.52727c0,27.30943 -22.21783,49.52727 -49.52727,49.52727z" fill="#000000"></path><path d="M52.0088,54.42188c-1.09017,-0.00056 -1.98233,-0.86782 -2.01374,-1.95754c-0.01065,-0.36876 -0.01428,-0.73752 -0.01428,-1.10953c0,-0.75717 0.01821,-1.54091 0.0557,-2.39617c0.05482,-1.10739 0.99373,-1.96258 2.10141,-1.91404c1.10768,0.04855 1.96818,0.9826 1.92591,2.09054c-0.03477,0.79587 -0.05177,1.5218 -0.05177,2.21967c0,0.33332 0.00312,0.66334 0.01263,0.99337c0.01548,0.53435 -0.18198,1.05296 -0.54894,1.44169c-0.36696,0.38873 -0.87334,0.61573 -1.40769,0.63104c-0.01979,0.00064 -0.03964,0.00097 -0.05923,0.00097z" fill="#000000"></path><path d="M59.68581,170.18023c-0.88763,-0.00187 -1.76993,-0.13723 -2.61729,-0.40155c-3.6153,-1.06804 -6.0794,-4.40985 -6.03105,-8.17931v-13.63792h-29.96001c-10.71309,0 -19.39777,-8.68468 -19.39777,-19.39777c0,-10.71309 8.68468,-19.39777 19.39777,-19.39777h29.96001v-13.63795c-0.00004,-3.75369 2.44498,-7.06968 6.03091,-8.17929c3.58594,-1.10961 7.47648,0.24594 9.5965,3.34364l22.60937,33.03569c2.01045,2.91033 2.01045,6.76101 0,9.67134l-22.60937,33.03572c-1.55479,2.33571 -4.1732,3.74082 -6.97907,3.74517zM21.07746,113.19716c-8.48669,0 -15.36652,6.87983 -15.36652,15.36652c0,8.48669 6.87983,15.36652 15.36652,15.36652h31.97564c1.1132,0 2.01563,0.90243 2.01563,2.01563v15.65355c0.00003,1.98628 1.29383,3.74094 3.19134,4.3281c1.89751,0.58717 3.95622,-0.13008 5.0781,-1.7692l22.60937,-33.03569c1.06381,-1.54009 1.06381,-3.57772 0,-5.11781l-22.60937,-33.03572c-1.12188,-1.63912 -3.18059,-2.35637 -5.0781,-1.7692c-1.89751,0.58717 -3.19131,2.34182 -3.19134,4.3281v15.65358c0,1.1132 -0.90243,2.01563 -2.01562,2.01563z" fill="#000000"></path></g></g></g></svg>
                    </div>
                </div>
            </div>
            <div class="container my-3">
                <h3 class="text-center">LOGIN</h3>
            </div>
            <div>
            <form>
                <div class="mb-3">
                  <label  for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" name="Correo" class="form-control" id="Email_L" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Nunca compartas tu Email con nadie.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Contaseña</label>
                  <input type="password" name="Clave" class="form-control" id="Clave_L">
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Recordar Usuario</label>
                </div>
            </div>
        </div>
        <div class="container-lg mb-3">
          <div class="row align-items-center text-center">
              <div class="col-md-12">
                <button id="Loguearse" type="button" class="btn btn-primary px-4"><b>Ingresar</b></button>
              </div>
          </div>
        </div>
            </form>
        <div class="modal-footer bg-color1 color1">
          <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--Teremina el login-->
<!--Modal de Registro-->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-color1 color1">
          <h5 class="modal-title" id="exampleModalLabel"><img src="{{ URL::to('/assets/img/Logo.png') }}" style="width: 30px; height: 30px;"> INI Computación</h5>
          <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
            <div class="container-lg mb-3">
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#9a2128"><path d="M61.97719,7.05469c-5.67708,-0.01128 -11.12588,2.23426 -15.14658,6.24217c-4.0207,4.00791 -6.28361,9.44952 -6.29043,15.1266c0.00074,5.67007 2.26235,11.1058 6.2838,15.10299c4.02146,3.99719 9.47077,6.22587 15.14074,6.1923h0.03346c11.78136,-0.00308 21.32953,-9.55625 21.32645,-21.33761c-0.00308,-11.78136 -9.55625,-21.32953 -21.33761,-21.32645zM55.82664,64.5c-18.06739,0 -32.64696,14.77535 -32.64696,32.84577v36.02142h47.01681c-0.20208,-1.71142 -0.30395,-3.4332 -0.3051,-5.15651c0.01943,-18.48144 12.00238,-34.82329 29.62286,-40.39845c-4.20736,-13.79662 -16.90768,-23.24632 -31.33142,-23.31222zM112.12373,91.28839c-20.34603,0.0228 -36.83417,16.51064 -36.85733,36.85667c-0.00015,14.90729 8.97965,28.34681 22.75214,34.05171c13.77249,5.7049 29.6254,2.55172 40.16654,-7.98924c10.54114,-10.54095 13.69461,-26.39381 7.98995,-40.1664c-5.70466,-13.77259 -19.14401,-22.75263 -34.05131,-22.75275zM105.14844,104.8125h12.09375c1.48427,0 2.6875,1.20323 2.6875,2.6875v12.42969h12.42969c1.48427,0 2.6875,1.20323 2.6875,2.6875v12.09375c0,1.48427 -1.20323,2.6875 -2.6875,2.6875h-12.42969v12.42969c0,1.48427 -1.20323,2.6875 -2.6875,2.6875h-12.09375c-1.48427,0 -2.6875,-1.20323 -2.6875,-2.6875v-12.42969h-12.42969c-1.48427,0 -2.6875,-1.20323 -2.6875,-2.6875v-12.09375c0,-1.48427 1.20323,-2.6875 2.6875,-2.6875h12.42969v-12.42969c0,-1.48427 1.20323,-2.6875 2.6875,-2.6875zM107.83594,110.1875v12.42969c0,1.48427 -1.20323,2.6875 -2.6875,2.6875h-12.42969v6.71875h12.42969c1.48427,0 2.6875,1.20323 2.6875,2.6875v12.42969h6.71875v-12.42969c0,-1.48427 1.20323,-2.6875 2.6875,-2.6875h12.42969v-6.71875h-12.42969c-1.48427,0 -2.6875,-1.20323 -2.6875,-2.6875v-12.42969z"></path></g></g></svg>
                    </div>
                </div>
            </div>
            <div class="container my-3">
                <h3 class="text-center">REGISTRO</h3>
            </div>
            <div>
                <form></form>
                    <div class="mb-3">
                        <label class="form-label" for="Nombre">*Nombre</label>
                        <input id="Nombre_R" name="Nombre" type="text" class="form-control" required>
                        @if ($errors->has('Nombre'))
                          <div>*El campo Nombre no puede se null</div><br>
                        @endif
                      </div>
                    <div class="mb-3">
                        <label class="form-label" for="Apellido">*Apellido</label>
                        <input id="Apellido_R" name="Apellido" type="text" class="form-control" required>
                        @if ($errors->has('Apellido'))
                          <div>*El campo Direecion no puede se null</div><br>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="Dni">*Dni</label>
                        <input id="Dni_R" name="Dni" type="number" class="form-control" required>
                        @if ($errors->has('Dni'))
                          <div>*El campo DNI no puede se null</div><br>
                        @endif
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">*Email</label>
                      <input id="Email_R" name="Email" type="email" class="form-control" aria-describedby="emailHelp" required>
                      @if ($errors->has('Email'))
                        <div>*El campo Email no puede se null y tiene que tener la siguiente estructura "example@example.com"</div><br>
                      @endif
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">*Contraseña</label>
                      <input id="Clave_R" name="Clave" type="password" class="form-control" required>
                      @if ($errors->has('Clave'))
                        <div>*El campo Contraseña no puede se null"</div><br>
                      @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">*Confirmar Contraseña</label>
                        <input id="Clave_R_C" name="Clave_c" type="password" class="form-control" required>
                        @if ($errors->has('Clave_c'))
                          <div>*La contraseñas no coinciden</div><br>
                        @endif
                      </div>
                      <div class="mb-3">
                        <label id="Codigo_Area_R" class="form-label">Codigo de Area</label>
                        <input name="Codigo_Area" type="number" class="form-control">
                      </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono</label>
                        <input id="Telefono_R" name="Telefono" type="number" class="form-control" >
                      </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Nacimiento</label>
                        <input id="Fecha_de_Nacimiento_R" name="Fecha_de_nacimiento" type="date" class="form-control">
                      </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion</label>
                        <input id="Direccion_R" name="Direccion" type="text" class="form-control">
                      </div>
                    <div id="emailHelp" class="form-text my-3">Los campos con * son abligatorios.</div>
          </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="Registrarse" type="button" class="btn btn-success">Registrarse</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@include('Libs.Footer')
<script>
var myCarousel = document.querySelector('#myCarousel')
var carousel = new bootstrap.Carousel(myCarousel)
</script>
@include('Libs.Finally')
