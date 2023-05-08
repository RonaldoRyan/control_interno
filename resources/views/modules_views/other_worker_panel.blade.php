@section('othersWorkers')
      @if(isset($othersWorkers))
     <!-- Aquí se muestran los datos de otros funcionarios -->
<h1 class="title">Registro de Otros Funcionarios</h1>

     <div class="infoOthersWorkers table-scrollable">
        <div class="table-responsive">

          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Funciones</th>
                <th>Condiciones</th>
                <th>Editar o Eliminar</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($othersWorkers as $otherWorker)
                <tr>
                  <td>{{ $otherWorker->name }}</td>
                  <td>{{ $otherWorker->idNumber }}</td>
                  <td>{{ $otherWorker->address }}</td>
                  <td>{{ $otherWorker->phone }}</td>
                  <td>{{ $otherWorker->email }}</td>
                  <td>{{ $otherWorker->section }}</td>
                  <td>{{ $otherWorker->conditions }}</td>
                   {{-- botones de eliminar y actualziar --}}
                   <td>
                    <form action="{{ route('delete.otherWorker', $otherWorker->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
    <button type="button" onclick="showConfirmation()" class="btn btn-danger mt-3"> <i class="fas fa-trash"></i> </button>



                    </form>
                    <form action="{{ route('update.otherWorker', $otherWorker) }}" method="POST">
                        @csrf
                        @method('PUT')
                     <button type="button" class="btn btn-update" id="modalProfessor2" data-toggle="modal" data-target="#otherWorkerUpdate{{$otherWorker->id}}">
                       <i class="fas fa-pencil-alt"></i>
                     </button>
                  </form>
                  </td>
                </tr>
               {{-- inicio modal --}}

      <!-- Modal para crear ficha de otros funcionarios -->


      <div class="modal fade" id="otherWorkerUpdate{{$otherWorker->id}}" tabindex="-1" role="dialog" aria-labelledby="actualizarOtherModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="actualizarOtherModalLabel">{{ __('Actualizar la ficha de otro tipo de funcionario') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- Aquí van los campos del formulario -->
               <form method="POST" action="{{ route('update.otherWorker', $otherWorker->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">{{ __('Nombre') }}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Nombre') }}" value="{{$otherWorker->name}}" required>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="idNumber">{{ __('Cedula') }}</label>
                    <input type="number" class="form-control" id="idNumber" name="idNumber" pattern="[0-9]+" placeholder="{{ __('Cedula') }}" value="{{$otherWorker->idNumber}}" required>
                </div>

                <div class="form-group">
                    <label for="address">{{ __('Dirección') }}</label>
                    <input type="text" class="form-control" id="address" name="address"  placeholder="{{ __('Direccion') }}" value="{{$otherWorker->address}}" required>
                </div>



                <div class="form-group">
                    <label for="phone">{{ __('Teléfono') }}</label>
                    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]+" placeholder="{{ __('Número de teléfono') }}" value="{{$otherWorker->phone}}" required>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Ingrese Un Correo') }}" value="{{$otherWorker->email}}" required>
                </div>
                <div class="form-group">
                    <label for="section">{{ __('Area de Trabajo') }}</label>
                    <input type="text" class="form-control" id="section" name="section"  placeholder="{{ __('Area de Trabajo') }}" value="{{$otherWorker->section}}" required>
                </div>


                <div class="form-group">
                    <label for="conditions">{{ __('condiciones especiales') }}</label>
                    <input type="text" class="form-control" id="conditions" name="conditions" placeholder="{{ __('condiciones especiales') }}" value="{{$otherWorker->conditions}}" required>
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


               {{-- fin modal --}}
              @endforeach
            </tbody>
          </table>
        </div>
      </div>


 @endif
     @endsection
