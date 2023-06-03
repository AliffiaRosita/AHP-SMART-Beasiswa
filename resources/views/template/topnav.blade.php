<form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

    </ul>

  </form>
  <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="{{asset('admin/assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
          <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
          <div class="dropdown-menu dropdown-menu-right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item has-icon text-danger" id="logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
          </div>
        </li>
  </ul>
