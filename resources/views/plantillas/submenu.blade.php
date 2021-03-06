<div class="submenu">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="categoria-menu text-center">
                    <span><i class="fa fa-inbox" aria-hidden="true"></i></span>
                    <a class="nav-link" href="/">Tablero</a>
                </div>
            </div>

            @can('home')
            <div class="col">
                <div class="categoria-menu text-center">
                    <span><i class="fa fa-users" aria-hidden="true"></i></span>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarSubmenu2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empleados</a>
                    <div class="dropdown-menu" aria-labelledby="navbarSubmenu2">
                        <a class="dropdown-item" href="{{ route('usuarios') }}">Empleados</a>
                        <a class="dropdown-item" href="#">Editar Roles</a>
                        <a class="dropdown-item" href="{{ route('provider') }}">Provedores</a>

                    </div>
                </div>
            </div>
            @endcan

            @can('reserva')
            <div class="col">
                <div class="categoria-menu text-center">
                    <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarSubmenu3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reserva</a>
                    <div class="dropdown-menu" aria-labelledby="navbarSubmenu3">
                        <a class="dropdown-item" href="{{ route('reserva') }}">Reservar</a>
                        <a class="dropdown-item" href="{{ route('reserva.lista') }}">Lista de reservas</a>
                    </div>
                </div>
            </div>
            @endcan
            
            @can('habitacion')
            <div class="col">
                <div class="categoria-menu text-center">
                    <span><i class="fa fa-home" aria-hidden="true"></i></span>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarSubmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Habitaciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarSubmenu">
                        <a class="dropdown-item" href="{{ route('habitacion') }}">Habitaciones</a>
                        <a class="dropdown-item" href="{{ route('tipohabitacion') }}">Tipos de habitaciones</a>
                    </div>
                </div>
            </div>
            @endcan
            
            @can('home')
            <div class="col">
                <div class="categoria-menu text-center">
                    <span><i class="fa fa-hotel" aria-hidden="true"></i></span>
                    <a class="nav-link dropdown-toggle" href="#" id="submenuservicio" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>
                    <div class="dropdown-menu" aria-labelledby="submenuservicio">
                        
                        <a class="dropdown-item" href="{{ route('servicio') }}">Agregar servicio</a>
                        <a class="dropdown-item" href="{{ route('servicio.buscar') }}">Reservar servicio</a>
                        <a class="dropdown-item" href="{{ route('servicio') }}">Cobrar servicio</a>
                        <a class="dropdown-item" href="{{ route('shop') }}">Agregar tienda</a>
    
                    </div>
                </div>
                
            </div>
            @endcan

            @can('home')
            <div class="col">
                <div class="categoria-menu text-center">
                    <span><i class="fa fa-cutlery" aria-hidden="true"></i></span>
                    <a class="nav-link" href="{{ route('order') }}">Restaurantes</a>
                </div>
            </div>
            @endcan

            @can('home')
            <div class="col">
                <div class="categoria-menu text-center">
                    <span><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                    <a class="nav-link dropdown-toggle" href="#" id="submenuprod" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                    <div class="dropdown-menu" aria-labelledby="submenuprod">
                        <a class="dropdown-item" href="{{ route('product.dashboard') }}">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('orderproduct') }}">Crear pedido</a>
                        <a class="dropdown-item" href="{{ route('product') }}">Agregar productos</a>
                        <a class="dropdown-item" href="{{ route('product.stock') }}">Alerta Stock</a>

                    </div>
                </div>
            </div>
            @endcan

        </div>              
    </div>
</div>  
