
@section('students')

@if(isset($students))
 <!-- Aquí se muestran los datos de estudiantes -->
 <h1 class="title">
    @if(isset($title))
        {{ $title }}
    @else
        Registro General de Menores
    @endif
</h1>

<div class="infoStudents">


    <!-- Aquí se muestran los datos de otros funcionarios -->

   <div class="row panelData">
       @foreach ($students as $student)
       <div class="col-lg-4 col-md-6 col-sm-12">
         <div class="card mt-3">
           <div class="card-body">
        <img src="{{ asset('imgs/osito.png') }}" class="stikerCard">

             <h5 class="name">{{ $student->name }}</h5>
             <p class="age"><em>Edad:</em> {{ $student->age }} años</p>
             <p class="benefit"> <em> Tipo de beneficio:</em> {{ $student->benefits }}</p>
             <p class="card-text"><em>Direccion:</em> {{ $student->address }}</p>




              <button class="btn btn-success moreInfo"><i class="far fa-eye"></i>
                otros datos
              </button>
              <div class="info" hidden>

             <hr>
             <p class="card-text"> <em>F.Nacimiento:</em> {{ $student->birth_date }}</p>
             <hr>
             <p class="card-text"> <em> Madre:</em> {{ $student->mom_name }}</p>
             <hr>
             <p class="card-text"><em>Telefono madre:</em> {{ $student->mom_phone }}</p>
             <hr>
             <p class="card-text"><em>Cedula madre:</em> {{ $student->idNumber_mom }}</p>
             <hr>
             <p class="card-text"> <em> Padre:</em> {{ $student->dad_name }}</p>
              <hr>
             <p class="card-text"><em>Telefono padre:</em> {{ $student->dad_phone }}</p>
             <hr>
             <p class="card-text"><em>cedula papa:</em> {{ $student->idNumber_dad }}</p>
             <hr>
             <p class="card-text"><em>Contacto Emergencia:</em> {{ $student->emergency_contact }}</p>
             <hr>
             <p class="card-text"><em>cedula:</em> {{ $student->emergency_Idcontact }}</p>
             <hr>
             <p class="card-text"><em>Numero Telefonico:</em> {{ $student->emergency_contact_phone }}</p>
             <hr>
             <p class="card-text"><em>Info de vacunas:</em> {{ $student->vaccine_information }}</p>
             <hr>
             <p class="card-text"><em>Alergias o condiciones especiales del menor:</em> {{ $student->allergies_or_conditions }}</p>
             <hr>



              </div>
              @can('delete.student')

                <form action="{{ route('delete.student', $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button"  class="btn btn-danger deleteData mt-3"> <i class="fas fa-trash"></i>
                    Eliminar
                </button>
                </form>

              @endcan


                 {{-- actualizar --}}
                 @can('update.student')
                <form action="{{ route('update.student', $student->id) }}" method="POST" onsubmit="console.log('Formulario enviado')">
                    @csrf
                    @method('PUT')
                <button type="button" class="btn btn-update" id="modalstudent2" data-toggle="modal" data-target="#studentUpdate{{$student->id}}">
                <i class="fas fa-pencil-alt"></i>
                Actualizar
                </button>
                </form>
                @endcan

            <button class="btn btn-pdf">
                <a href="{{ route('export.pdf', ['id' => $student->id]) }}" target="_blank">
                    <i class="fa-regular fa-file-pdf" style="color: #ffffff;"></i>
                    Descargar pdf
                </a>

            </button>

           </div>
         </div>
       </div>
  {{-- inicio modal --}}
              {{-- modal de update --}}
     <div class="modal fade updateStudents" id="studentUpdate{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="actualizarEstudianteModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <div class="modal-content modalUpdateBody">
         <div class="modal-header">
         <h5 class="modal-title" id="actualizarEstudianteModalLabel">{{ __('Modificacion de datos') }}</h5>
         <button type="button" class=" btn btn-danger" aria-label="close" data-dismiss="modal">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body modalUpdate">


         <form method="POST" action="{{ route('update.student', $student->id) }}" onsubmit="console.log('formulario enviado')">
         @csrf
         @method('PUT')
         <div class="form-group">
         <label for="name">{{ __('Nombre') }}</label>
         <input type="text" class="form-control" id="nameModal" name="name" placeholder="{{ __('Ingrese el nombre del estudiante') }}" value="{{$student->name}}" required>
         @error('name')
         <small class="text-danger">{{ $message }}</small>
         @enderror
         </div>
         <div class="form-group">
         <label for="birth_date">{{ __('Fecha de Nacimiento') }}</label>
         <input type="date" class="form-control birth_date" id="birth_dateModal" name="birth_date" placeholder="{{ __('Ingrese la fecha de nacimiento del estudiante') }}" value="{{$student->birth_date}}" required>
        </div>
        <div class="form-group">
            <label for="age">{{ __('Edad') }}</label>
            <input type="number" class="form-control age" id="ageModal" name="age" placeholder="{{ __('Edad del estudiante') }}" value="{{$student->age}}" required>
           </div>
         <div class="form-group">
         <label for="address">{{ __('Dirección') }}</label>
         <input type="text" class="form-control" id="addressModal" name="address" placeholder="{{ __('Ingrese la dirección del estudiante') }}"
         value="{{$student->address}}" required>
         </div>
         <div class="form-group">
            <label for="benefits">{{ __('Tipo de Beneficio') }}</label>
            <select name="benefits" id="benefitsModal" class="form-control" required>
                <option disabled>Seleccione tipo de beneficio</option>
                <option value="Cuido" {{ $student->benefits == 'Cuido' ? 'selected' : '' }}>Cuido</option>
                <option value="Solo Alimentacion" {{ $student->benefits == 'Solo Alimentacion' ? 'selected' : '' }}>Solo Alimentacion</option>
            </select>
        </div>

         <div class="form-group">
         <label for="dad_name">{{ __('Nombre del Padre') }}</label>
         <input type="text" class="form-control" id="dad_nameModal" name="dad_name"  placeholder="{{ __('Ingrese el nombre del padre del estudiante') }}" value="{{$student->dad_name}}">
         </div>
         <div class="form-group">
         <label for="idNumber_dad">{{ __('Cedula del Padre') }}</label>
         <input type="number" class="form-control" id="idNumber_dadModal" name="idNumber_dad" pattern="[0-9]+" placeholder="{{ __('Cedula Padre') }}" value="{{$student->idNumber_dad}}">
         </div>
         <div class="form-group">
         <label for="dad_phone">{{ __('Teléfono del Padre') }}</label>
         <input type="number" class="form-control" id="dad_phoneModal" name="dad_phone" pattern="[0-9]+" placeholder="{{ __('Ingrese el número de teléfono del padre del estudiante') }}" value="{{$student->dad_phone}}">
         </div>
         <div class="form-group">
         <label for="mom_name">{{ __('Nombre de la Madre') }}</label>
         <input type="text" class="form-control" id="mom_nameModal" name="mom_name" placeholder="{{ __('Ingrese el nombre de la madre del estudiante') }}" value="{{$student->mom_name}}" required>
         </div>
         <div class="form-group">
         <label for="idNumber_mom">{{ __('Cedula de la madre') }}</label>
         <input type="number" class="form-control" id="idNumber_momModal" name="idNumber_mom" pattern="[0-9]+" placeholder="{{ __('Cedula Madre') }}" value="{{$student->idNumber_mom}}">
         </div>
         <div class="form-group">
         <label for="mom_phone">{{ __('Teléfono de la Madre') }}</label>
         <input type="number" class="form-control" id="mom_phoneModal" name="mom_phone" pattern="[0-9]+" placeholder="{{ __('Ingrese el número de teléfono de la madre del estudiante') }}" value="{{$student->mom_phone}}" required>
         </div>
         <div class="form-group">
         <label for="emergency_contact">{{ __('Contacto de Emergencia') }}</label>
         <input type="text" class="form-control" id="emergency_contactModal" name="emergency_contact"  placeholder="{{ __('Ingrese el contacto de emergencia del estudiante') }}"
value="{{$student->emergency_contact}}" required>
         </div>
         <div class="form-group">
            <label for="emergency_Idcontact">{{ __('Cedula del Contacto de Emergencia') }}</label>
            <input type="number" class="form-control" id="emergency_IdcontactModal" name="emergency_Idcontact" pattern="[0-9]+" placeholder="{{ __('Cedula del Contacto de emergencia') }}" value="{{$student->emergency_Idcontact}}">
            </div>
         <div class="form-group">
         <label for="emergency_contact_phone">{{ __('Teléfono de Emergencia') }}</label>
         <input type="number" class="form-control" id="emergency_contact_phoneModal" name="emergency_contact_phone" pattern="[0-9]+" placeholder="{{ __('Ingrese el número de teléfono de emergencia del estudiante') }}" value="{{$student->emergency_contact_phone}}" required>
         </div>
         <div class="form-group">
         <label for="vaccine_information">{{ __('Vacunas') }}</label>
         <input type="text" class="form-control" id="vaccine_informationModal" name="vaccine_information" placeholder="{{ __('Registro de Vacunas') }}" value="{{$student->vaccine_information}}" required>
         </div>
         <div class="form-group">
         <label for="allergies_or_conditions">{{ __('Alergias/condiciones especiales') }}</label>
         <input type="text" class="form-control" id="allergies_or_conditionsModal" name="allergies_or_conditions" placeholder="{{ __('Alergias de lniño o alguna condicion diferente que merezca atencion especial') }}" value="{{$student->allergies_or_conditions}}" required>
         </div>

         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-danger close" data-dismiss="modal">cerrar</button>
         <button type="submit" class="btn btn-primary">Guardar</button>

         </form>

         </div>
         </div>
         </div>
         </div>

         {{-- fin modal --}}

         @endforeach
        </div>

  @endif

  @endsection
