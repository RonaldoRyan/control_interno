{{-- menu horizontal --}}
<nav class="navbar navbar-expand-lg menu1">
    <img src="{{ asset('imgs/logo.jpeg') }}" alt="Logo" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">

        <li>
            <a class="btn links" href="{{ route('profile') }}"><i class="fas fa-user"></i>
                Ir a Mi perfil</a>

        </li>

        <li class="nav-item active">
          {{-- <a class="nav-link" href="#">Cerrar sesión</a> --}}
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn links  ml-2">
                <i class="fas fa-sign-out ml-1"></i>
                 Cerrar Sesion
            </button>

          </form>
        </li>


      </ul>
    </div>
  </nav>
