<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">SPK Beasiswa</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SPK</a>
    </div>
    <ul class="sidebar-menu">
        <li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a class="nav-link" href="{{route('dashboard')}}"><i class="fas fa-pencil-ruler"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Data</li>
        <li class="{{ Request::is('kriteria*') ? 'active' : '' }}"><a class="nav-link" href="{{route('kriteria.index')}}" ><i class="fas fa-box"></i> <span>Kriteria</span></a></li>
        <li class="{{ Request::is('mahasiswa*') ? 'active' : '' }}"><a class="nav-link" href="{{route('mahasiswa.index')}}"><i class="fas fa-users"></i> <span>Mahasiswa</span></a></li>
    </ul>
</aside>
