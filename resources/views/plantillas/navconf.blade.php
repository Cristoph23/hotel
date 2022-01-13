<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{request()->routeIs('configuraciones') ? 'active' : ''}}" href="{{ route('configuraciones') }}">Principal</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{request()->routeIs('configuraciones.iva') ? 'active' : ''}}" href="{{ route('configuraciones.iva') }}">IVA</a>
    </li>
</ul>