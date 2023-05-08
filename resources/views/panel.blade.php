@extends('layouts.plantilla')



@section('styles')

    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mediaQ_panel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modals.css') }}">



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

{{-- panel de estudiantes --}}
     @include('modules_views.student_panel')

{{-- panel de profesores --}}
     @include('modules_views.professor_panel')
{{-- panel de otros funcioanrios --}}
     @include('modules_views.other_worker_panel')



      @endsection

      @section('scripts')

    <script type="text/javascript" src="{{ asset('js/panel.js') }}"></script>

      @endsection


 @endsection

