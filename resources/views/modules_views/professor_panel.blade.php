@section('professors')
@if(isset($professors))
<!-- Aquí se muestran los datos de maestros -->
<h1 class="title">Registro de Maestros</h1>

<div class="infoProfessors  table-scrollable">
    <div class="table-responsive">

      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Condiciones</th>
            @can('update.professor')
            <th>Editar o Eliminar</th>
            @endcan

          </tr>
        </thead>
        <tbody>
          @foreach ($professors as $professor)
            <tr>
              <td>{{ $professor->name }}</td>
              <td>{{ $professor->idNumber }}</td>
              <td>{{ $professor->address }}</td>
              <td>{{ $professor->phone }}</td>
              <td>{{ $professor->email }}</td>
              <td>{{ $professor->allergies_or_conditions }}</td>

              {{-- botones de eliminar y actualziar --}}
              @can('delete.professor')

               <td>
                  <form action="{{ route('delete.professor', $professor->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
    <button type="button" onclick="showConfirmation()" class="btn btn-danger mt-3"> <i class="fas fa-trash"></i> </button>

                  </form>

                   <form action="{{ route('update.professor', $professor) }}" method="POST">
                    @csrf
                    @method('PUT')
                   <button type="button" class="btn btn-update" id="modalProfessor2" data-toggle="modal" data-target="#professorUpdate{{$professor->id}}">                        <i class="fas fa-pencil-alt"></i>
                    </button>
                   </form>
                </td>
                @endcan

            </tr>


            {{-- inicio modal --}}
                    <!-- Modal para actualizar ficha del profesor -->

<div class="modal fade" id="professorUpdate{{$professor->id}}" tabindex="-1" role="dialog" aria-labelledby="actualizarProfesorModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
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
        </tbody>
      </table>
    </div>
  </div>
@endif
@endsection
