@extends('layouts.plantilla')



@section('styles')

    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mediaQ_panel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modals.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stikers.css') }}">



@endsection


@section('sidebar')
      @include('modules_views.menu')
@endsection


  @section('content')
{{-- panel de botones para creacion de fichas y vista de paneles --}}
@include('modules_views.menu_parallel')





{{-- modales de creacion de fichas y registro de usuario --}}
@include('modules_views.modals')


@section('dashboard')



{{-- @include('modules_views.logo') --}}
@if (!isset($students) && !isset($professors) && !isset($othersWorkers))

         <h2 class="title">Control de Datos Internos</h2>
        <div class="imgDashboard">
        <img src="{{ asset('imgs/logo.jpeg') }}" alt="Logo">

        </div>

@endif


  {{-- panel de estudiantes --}}
  @include('modules_views.student_panel')

  {{-- panel de profesores --}}
  @include('modules_views.professor_panel')

  {{-- panel de otros funcionarios --}}
  @include('modules_views.OtherWorker_panel')
@endsection



 @endsection

