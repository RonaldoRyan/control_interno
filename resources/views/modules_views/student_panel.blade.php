
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

 <div class="infoStudents table-scrollable">
     <div class="table-responsive">

       <table class="table table-bordered table-striped">
         <thead class="thead-dark sticky-top">
             <tr>
             <th>Nombre</th>
             <th>Fecha Nacimiento</th>
             <th>Edad</th>
             <th>Dirección</th>
             <th>Tipo de Beneficio</th>
             <th>Nombre del Padre</th>
             <th>Cedula Padre</th>
             <th>Telefono Padre</th>
             <th>Nombre de la Madre</th>
             <th>Cedula Madre</th>
             <th>Telefono Madre</th>
             <th>Contacto de Emergencia</th>
             <th>Cedula Contacto de Emergencia</th>
             <th>Telefono del contacto de emergencia</th>
             <th>Registro de Vacunas</th>
             <th>Alergias del menor o alguna condicion especial</th>
             <th>Editar o Eliminar</th>
           </tr>
         </thead>
         <tbody>
           @foreach ($students as $student)
             <tr>
               <td>{{ $student->name }}</td>
               <td>{{ $student->birth_date }}</td>
               <td>{{ $student->age }}</td>
               <td>{{ $student->address }}</td>
               <td>{{ $student->benefits }}</td>
               <td>{{ $student->dad_name }}</td>
               <td>{{ $student->idNumber_dad }}</td>
               <td>{{ $student->dad_phone }}</td>
               <td>{{ $student->mom_name }}</td>
               <td>{{ $student->idNumber_mom }}</td>
               <td>{{ $student->mom_phone }}</td>
               <td>{{ $student->emergency_contact }}</td>
               <td>{{ $student->emergency_Idcontact }}</td>
               <td>{{ $student->emergency_contact_phone }}</td>
               <td>{{ $student->vaccine_information }}</td>
               <td>{{ $student->allergies_or_conditions }}</td>
                {{-- botones de eliminar y actualziar --}}

                <td>
{{-- eliminar --}}
@can('delete.student')
<form action="{{ route('delete.student', $student->id) }}" method="POST" id="delete-form">
    @csrf
    @method('DELETE')

    <button type="button" onclick="showConfirmation()" class="btn btn-danger mt-3"> <i class="fas fa-trash"></i> </button>
</form>
@endcan



                 {{-- actualizar --}}
<form action="{{ route('update.student', $student) }}" method="POST">
   @csrf
   @method('PUT')
     <button type="button" class="btn btn-update" id="modalStudent2" data-toggle="modal" data-target="#studentUpdate{{$student->id}}">
         <i class="fas fa-pencil-alt"></i>
     </button>
               </form>

               </td>

             </tr>
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


         <form method="POST" action="{{ route('update.student', $student->id) }}">
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
         <input type="date" class="form-control" id="birth_dateModal" name="birth_date" placeholder="{{ __('Ingrese la fecha de nacimiento del estudiante') }}" value="{{$student->birth_date}}" required>
        </div>
        <div class="form-group">
            <label for="age">{{ __('Edad') }}</label>
            <input type="number" class="form-control" id="ageModal" name="age" placeholder="{{ __('Edad del estudiante') }}" value="{{$student->age}}" required>
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

