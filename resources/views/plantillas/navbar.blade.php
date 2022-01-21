<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #00ba8b">
    <div class="container"> 
          <a class="navbar-brand" href="#">Hotel Siani</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @if (Auth::guest())
          
      @else
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog" aria-hidden="true"></i> Cuenta
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"><i class="fa fa-key" aria-hidden="true"></i> Cambiar clave</a>
                <a class="dropdown-item" href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configuraciones</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> Mi Perfil</a>

              </div>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user" aria-hidden="true"></i> {{auth()->user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                  <a class="dropdown-item" href="{{ route('promotion') }}"><i class="fa fa-money" aria-hidden="true"></i> Promociones</a>
                  <a class="dropdown-item" href="{{ route('configuraciones') }}"><i class="fa fa-cog" aria-hidden="true"></i> Configuraciones</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <i class="fa fa-power-off" aria-hidden="true"></i> Cerrar Sesion
                  </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>
              </div>
            </li>
          </ul>
        </div>
      @endif
      
    </div>
</nav>