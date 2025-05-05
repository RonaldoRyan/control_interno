@extends('layouts.plantilla')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/mediaQ_login.css') }}">

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center login">
        <div class="col-md-6 col-lg-4">
            <div class="login-container">
                <h1 class="text-center my-5">Iniciar sesión</h1>

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <img src="{{ asset('imgs/logo.jpeg') }}" alt="Logo" class="logo">
                <img src="{{ asset('imgs/pintura.png') }}" class="pintura">
                <img src="{{ asset('imgs/creatividad.png') }}" class="creatividad">
                <img src="{{ asset('imgs/cerebro.png') }}" class="cerebro">
                <img src="{{ asset('imgs/engranaje.png') }}" class="engranaje">






                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label for="remember" class="form-check-label">Mantener Sesión Iniciada</label>
                        @if(session('login_error'))
                        <div class="alert alert-danger">{{ session('login_error') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('showFormForgetPassword') }}" class="forgetPassword">{{ __('¿Olvidaste tu contraseña?') }}</a>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn w-100">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
