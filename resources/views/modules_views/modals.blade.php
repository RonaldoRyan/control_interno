
  {{-- modal de creacion de cuentas --}}
  <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content registerModal">
        <div class="modal-header">

          <h5 class="modal-title" id="registerModalLabel">Registro</h5>
          @if(session('register_error'))
          <div class="alert alert-danger">{{ session('register_error') }}</div>
      @endif
          <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Correo electrónico</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
                @if (session('error'))
               <div class="alert alert-danger">{{ session('error') }}</div>
              @endif
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn register">Crear Usuario</button>
            <button type="button" class="btn close" data-dismiss="modal">Cancelar</button>

          </div>
        </form>
      </div>
    </div>
  </div>


{{-- Creacion de perfil de estudiante --}}

<div class="modal fade" id="student" tabindex="-1" role="dialog" aria-labelledby="agregarEstudianteModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content createTab">
        <div class="modal-header">
            <h5 class="modal-title" id="agregarEstudianteModalLabel">{{ __('Crear ficha de Estudiante') }}</h5>
            <button type="button" class=" btn btn-danger close"  data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('saveStudent') }}">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('Nombre') }}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Ingresar Nombre') }}" required>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="birth_date">{{ __('Fecha de Nacimiento') }}</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="{{ __('Ingresar la fecha de nacimiento') }}" required>
                </div>
                <div class="form-group">
                    <label for="age">{{ __('Edad') }}</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="{{ __('Edad') }}" required>
                </div>
                <div class="form-group">
                    <label for="address">{{ __('Dirección') }}</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="{{ __('Ingrese la dirección del menor') }}" required>
                </div>
                <div class="form-group">
                    <label for="benefits">{{ __('Tipo de Beneficio') }}</label>
                    <select name="benefits" id="benefits" class="form-control" required>
                        <option selected="true" disabled>Seleccione tipo de beneficio</option>
                        <option value="Cuido">Cuido</option>
                        <option value="Solo Alimentacion">Solo Alimentacion</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dad_name">{{ __('Nombre del Padre') }}</label>
                    <input type="text" class="form-control" id="dad_name" name="dad_name"  placeholder="{{ __('Ingrese el nombre del padre del menor') }}">
                </div>
                <div class="form-group">
                    <label for="idNumber_dad">{{ __('Cedula del Padre') }}</label>
                    <input type="number" class="form-control" id="idNumber_dad" name="idNumber_dad" pattern="[0-9]+" placeholder="{{ __('Cedula Padre') }}">
                </div>
                <div class="form-group">
                    <label for="dad_phone">{{ __('Teléfono del Padre') }}</label>
                    <input type="number" class="form-control" id="dad_phone" name="dad_phone" pattern="[0-9]+" placeholder="{{ __('Ingrese el número de teléfono del padre del menor') }}">
                </div>
                <div class="form-group">
                    <label for="mom_name">{{ __('Nombre de la Madre') }}</label>
                    <input type="text" class="form-control" id="mom_name" name="mom_name" placeholder="{{ __('Ingrese el nombre de la madre del menor') }}" required>
                </div>
                <div class="form-group">
                    <label for="idNumber_mom">{{ __('Cedula de la madre') }}</label>
                    <input type="number" class="form-control" id="idNumber_mom" name="idNumber_mom" pattern="[0-9]+" placeholder="{{ __('Cedula Madre') }}">
                </div>
                <div class="form-group">
                    <label for="mom_phone">{{ __('Teléfono de la Madre') }}</label>
                    <input type="number" class="form-control" id="mom_phone" name="mom_phone" pattern="[0-9]+" placeholder="{{ __('Ingrese el número de teléfono de la madre del menor') }}" required>
                </div>
                <div class="form-group">
                    <label for="emergency_contact">{{ __('Contacto de Emergencia') }}</label>
                    <input type="text" class="form-control" id="emergency_contact" name="emergency_contact"  placeholder="{{ __('Ingrese el contacto de emergencia del menor') }}" required>
                </div>
                <div class="form-group">
                    <label for="emergency_Idcontact">{{ __('Cedula') }}</label>
                    <input type="number" class="form-control" id="emergency_Idcontact" name="emergency_Idcontact" pattern="[0-9]+" placeholder="{{ __('Ingrese el número de identificacion') }}" required>
                </div>
                <div class="form-group">
                    <label for="emergency_contact_phone">{{ __('Teléfono de Emergencia') }}</label>
                    <input type="number" class="form-control" id="emergency_contact_phone" name="emergency_contact_phone" pattern="[0-9]+" placeholder="{{ __('Ingrese el número de teléfono de emergencia del menor') }}" required>
                </div>
                <div class="form-group">
                    <label for="vaccine_information">{{ __('Vacunas') }}</label>
                    <input type="text" class="form-control" id="vaccine_information" name="vaccine_information" placeholder="{{ __('Registro de Vacunas') }}" required>
                </div>
                <div class="form-group">
                    <label for="allergies_or_conditions">{{ __('Alergias/condiciones especiales') }}</label>
                    <input type="text" class="form-control" id="allergies_or_conditions" name="allergies_or_conditions" placeholder="{{ __('Alergias del menor o alguna condicion que merezca atencion especial') }}" required>
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






  <!-- Modal para crear ficha del profesor -->

<div class="modal fade" id="profesor" tabindex="-1" role="dialog" aria-labelledby="agregarProfesorModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content createTab">
<div class="modal-header">
    <h5 class="modal-title" id="agregarProfesorModalLabel">{{ __('Crear ficha de Profesor') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Cerrar') }}">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
        <form method="POST" action="{{ route('saveProfessor') }}">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('Nombre') }}</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Nombre') }}" required>
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="idNumber">{{ __('Cedula') }}</label>
                <input type="number" class="form-control" id="idNumber" name="idNumber" pattern="[0-9]+" placeholder="{{ __('Cedula') }}" required>
            </div>

            <div class="form-group">
                <label for="address">{{ __('Dirección') }}</label>
                <input type="text" class="form-control" id="address" name="address"  placeholder="{{ __('Direccion') }}" required>
            </div>



            <div class="form-group">
                <label for="phone">{{ __('Teléfono') }}</label>
                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]+" placeholder="{{ __('Número de teléfono') }}" required>
            </div>
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Ingrese Un Correo') }}" required>
            </div>


            <div class="form-group">
                <label for="allergies_or_conditions">{{ __('Alergias/condiciones especiales') }}</label>
                <input type="text" class="form-control" id="allergies_or_conditions" name="allergies_or_conditions" placeholder="{{ __('Alergias de lniño o alguna condicion diferente que merezca atencion especial') }}" required>
            </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn close" data-dismiss="modal">cerrar</button>
        <button type="submit" class="btn btn-primary" data-toggle="modal">Guardar</button>

        </form>

    </div>
    </div>
</div>
</div>










  <!-- Modal para crear ficha de otros funcionarios -->


  <div class="modal fade" id="other" tabindex="-1" role="dialog" aria-labelledby="agregarOtherModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content createTab">
    <div class="modal-header">
      <h5 class="modal-title" id="agregarOtherModalLabel">{{ __('Crear ficha de otro tipo de funcionario') }}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Cerrar') }}">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
       <!-- Aquí van los campos del formulario -->
       <form method="POST" action="{{ route('saveOtherWorker') }}">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Nombre') }}</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Nombre') }}" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="idNumber">{{ __('Cedula') }}</label>
            <input type="number" class="form-control" id="idNumber" name="idNumber" pattern="[0-9]+" placeholder="{{ __('Cedula') }}" required>
        </div>

        <div class="form-group">
            <label for="address">{{ __('Dirección') }}</label>
            <input type="text" class="form-control" id="address" name="address"  placeholder="{{ __('Direccion') }}" required>
        </div>



        <div class="form-group">
            <label for="phone">{{ __('Teléfono') }}</label>
            <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]+" placeholder="{{ __('Número de teléfono') }}" required>
        </div>
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Ingrese Un Correo') }}" required>
        </div>
        <div class="form-group">
            <label for="section">{{ __('Area de Trabajo') }}</label>
            <input type="text" class="form-control" id="section" name="section"  placeholder="{{ __('Area de Trabajo') }}" required>
        </div>


        <div class="form-group">
            <label for="conditions">{{ __('condiciones especiales') }}</label>
            <input type="text" class="form-control" id="conditions" name="conditions" placeholder="{{ __('condiciones especiales') }}" required>
        </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn close" data-dismiss="modal">cerrar</button>
    <button type="submit" class="btn btn-primary" data-toggle="modal">Guardar</button>

    </form>

</div>
</div>
</div>
</div>
