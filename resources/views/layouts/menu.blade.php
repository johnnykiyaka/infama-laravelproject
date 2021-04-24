<li class="nav-item {{ Request::is('flights*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('flights.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Flights</span>
    </a>
</li>
