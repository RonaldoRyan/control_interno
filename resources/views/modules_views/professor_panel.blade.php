@section('professors')
@if(isset($professors))
<!-- Aquí se muestran los datos de maestros -->
<h1 class="title">Registro de Maestros</h1>

<div class="infoProfessors">


 <!-- Aquí se muestran los datos de otros funcionarios -->

<div class="row panelData">
    @foreach ($professors as $professor)
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card mt-2 cards">
        <div class="card-body">
        <img src="{{ asset('imgs/profesora.png') }}" class="stikerCard">

          <h5 class="card-title name"> {{ $professor->name }}</h5>
          <p class="card-text"><em>Cedula:</em> {{ $professor->idNumber }}</p>
          <p class="card-text"> <em> Telefono:</em> {{ $professor->phone }}</p>
           <button class="btn btn-success moreInfo"><i class="far fa-eye"></i>
            ver mas
           </button>
           <div class="info" hidden>
          {{-- <hr> --}}
          <hr>
          <p class="card-text"><em>Direccion:</em> {{ $professor->address }}</p>
          <hr>
          <p class="card-text"><em>Correo:</em> {{ $professor->email }}</p>
          <hr>
          <p class="card-text"><em>Algun padecimiento o condicion especial:</em> {{$professor->allergies_or_conditions}}</p>
          <hr>


           </div>
           @can('delete.professor')

           <form action="{{ route('delete.professor', $professor->id) }}" method="POST">
              @csrf
              @method('DELETE')
  <button type="button"  class="btn btn-danger deleteData mt-3"> <i class="fas fa-trash"></i>
  Eliminar
</button>


            </form>
                      <form action="{{ route('update.professor', $professor) }}" method="POST">
                          @csrf
                          @method('PUT')
                       <button type="button" class="btn btn-update" id="modalProfessor2" data-toggle="modal" data-target="#professorUpdate{{$professor->id}}">
                         <i class="fas fa-pencil-alt"></i>
                         Actualizar
                       </button>
                    </form>

          @endcan

        </div>
      </div>
    </div>


            {{-- inicio modal --}}
                    <!-- Modal para actualizar ficha del profesor -->

<div class="modal fade" id="professorUpdate{{$professor->id}}" tabindex="-1" role="dialog" aria-labelledby="actualizarProfesorModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content modalUpdateBody">
<div class="modal-header">
    <h5 class="modal-title" id="actualizarProfesorModalLabel">{{ __('Actualizar ficha de Profesor') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Cerrar') }}">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <!-- Aquí van los campos del formulario -->
    <form method="POST" action="{{ route('update.professor', $professor->id) }}">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="name">{{ __('Nombre') }}</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Nombre') }}" value="{{$professor->name}}" required>
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="idNumber">{{ __('Cedula') }}</label>
                <input type="number" class="form-control" id="idNumber" name="idNumber" pattern="[0-9]+" placeholder="{{ __('Cedula') }}" value="{{$professor->idNumber}}" required>
            </div>

            <div class="form-group">
                <label for="address">{{ __('Dirección') }}</label>
                <input type="text" class="form-control" id="address" name="address"  placeholder="{{ __('Direccion') }}" value="{{$professor->address}}" required>
            </div>



            <div class="form-group">
                <label for="phone">{{ __('Teléfono') }}</label>
                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]+" placeholder="{{ __('Número de teléfono') }}" value="{{$professor->phone}}" required>
            </div>
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Ingrese Un Correo') }}" value="{{$professor->email}}" required>
            </div>


            <div class="form-group">
                <label for="allergies_or_conditions">{{ __('Alergias/condiciones especiales') }}</label>
                <input type="text" class="form-control" id="allergies_or_conditions" name="allergies_or_conditions" placeholder="{{ __('Alergias de lniño o alguna condicion diferente que merezca atencion especial') }}" value="{{$professor->allergies_or_conditions}}" required>
            </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger close" data-dismiss="modal">cerrar</button>
        <button type="submit" class="btn btn-primary" data-toggle="modal">Guardar</button>

        </form>

    </div>
    </div>
</div>
</div>
            {{-- final del modal --}}
          @endforeach
      </div>

@endif

@endsection
