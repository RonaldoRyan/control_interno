@extends('layouts.plantilla')

@section('styles')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/modals.css') }}">



@endsection


@section('sidebar')

@include('modules_views.modals')

<nav class="navbar navbar-expand-lg menu1">
    <img src="{{ asset('imgs/logo.jpeg') }}" alt="Logo" class="logo">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link links" href="{{route('panel')}}"> <i class="fas fa-th-large"></i>Panel Principal</a>
        </li>



        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-cerrar ml-2 links">
                    <i class="fas fa-sign-out ml-1"></i>
                    Cerrar Sesion
                </button>

              </form>
        </li>

      </ul>
    </div>
  </nav>

@endsection

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Mis datos</h2></div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                            </div>


                        </div>
                        <div class="form-group row">
                            <label for="last_login" class="col-md-4 col-form-label text-md-right">Ultima Conexion</label>

                            <div class="col-md-6">
                                <input id="last_login" type="text" class="form-control" name="email" value="{{ Auth::user()->last_login_at }}" readonly>
                            </div>


                        </div>

                        <hr>

                        <form method="POST" action="{{ route('changePassword') }}">

                            @csrf

                            <div class="form-group row">
                                <h3>Cambiar Contraseña</h3>

                                <label for="current_password" class="col-md-4 col-form-label text-md-right">Contraseña actual</label>

                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">

                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nueva contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contraseña</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn createUser mt-3">
                                        Guardar nueva contraseña
                                    </button>
                                </div>
                                @if(session('change'))
                                <div class="alert alert-success">{{ session('change') }}</div>
                                @endif

                            </div>
                        </form>
                        <hr>
                        @can('register')

                        <div class="form-group row">
                            <h3>Creacion de  Usarios</h3>
                            <button type="submit" class="btn createUser" id="register" data-toggle="modal" data-target="#registerModal">Cre@r Usuario</button>
                        </div>

                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
