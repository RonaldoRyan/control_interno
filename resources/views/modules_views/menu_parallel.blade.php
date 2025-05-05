
{{-- menu paralelo --}}


<div class="container-fluid menu2 d-flex flex-column">








<div class="row">
<div class="col-md-3 botonesMenu">
<!-- Aquí va el menú -->
<ul class=" nav flex-column">





<button class="btn boton menu-btn main-btn" type="button" data-bs-toggle="collapse" data-bs-target="#menu" >
    <i class="fas fa-bars"></i>
    Creacion de Fichas

</button>

    <div class="collapse menu-items" id="menu">
<ul class="list-group">



{{-- inicio de botones que invocan el modal para la creacion de perfiles o fichas --}}




    @can('saveStudent')
    <li class="nav-item">
    <button type="submit" class="btn crearPerfil" id="modalStudent" data-toggle="modal" data-target="#student">{{ __('Crear ficha de Niñ@') }}
        <i class="fas fa-pencil-alt"></i>
    </button>
    </li>
    @endcan

    @can('saveProfessor')
    <li class="nav-item">
    <button type="button" class="btn crearPerfil" id="modalProfesor" data-toggle="modal" data-target="#profesor">{{ __('Crear ficha de Profesor') }}
        <i class="fas fa-pencil-alt"></i>
    </button>
    </li>
    @endcan

    @can('saveOtherWorker')
    <li class="nav-item">
    <button type="button" class="btn crearPerfil" id="modalOthers" data-toggle="modal" data-target="#other">{{ __('Crear ficha de Otro tipo de Funcionario') }}
        <i class="fas fa-pencil-alt"></i>
    </button>
    </li>
    @endcan

{{-- fin de botones --}}


</ul>
</div>

{{-- inicio de botones para ver el panel respectivo de cada tipo de ficha --}}
<button class="btn boton menu-btn main-btn" type="button" data-bs-toggle="collapse" data-bs-target="#menu2">
    <i class="fas fa-bars"></i>
     Paneles de registros

</button>

<div class="collapse menu-items" id="menu2">
<ul class="list-group">

    {{-- panel de estudiantes --}}

<li class="nav-item">
<form id="crearPerfilForm" method="get" action="{{ route('sections', ['option' => 'students']) }}">
    <input type="hidden" name="tipo" value="students">
    <button type="submit" class="btn panelRegistro">{{ __('Panel de Estudiantes') }}
     <i class="fas fa-th-large"></i>

    </button>
</form>
</li>

{{-- panel de profesores --}}

<li class="nav-item">
<form id="crearPerfilForm" method="get" action="{{ route('sections', ['option' => 'professors']) }}">
    <input type="hidden" name="tipo" value="professors">
    <button type="submit" class="btn panelRegistro">{{ __('Panel de profesores') }}
        <i class="fas fa-th-large"></i>
    </button>
</form>
</li>
{{-- panel de otros funcionarios --}}
@can('saveOtherWorker')
<li class="nav-item">
<form id="crearPerfilForm" method="get" action="{{ route('sections', ['option' => 'othersWorkers']) }}">
    <input type="hidden" name="tipo" value="othersWorkers">
    <button type="submit" class="btn panelRegistro">{{ __('Panel de Otros Funcionarios') }}
        <i class="fas fa-th-large"></i>
    </button>
</form>
</li>
@endcan

<li class="nav-item">
<form id="crearPerfilForm" method="get" action="{{ route('sections', ['option' => 'mealBenefit']) }}">
    <input type="hidden" name="tipo" value="mealBenefit">
    <button type="submit" class="btn  panelRegistro">{{ __('Panel de Beneficiarios de servicio de comedor') }}
        <i class="fas fa-th-large"></i>
    </button>
</form>
</li>

</ul>
</div>


<!-- Menú colapsable -->
  <button class="btn boton menu-btn main-btn"  type="button" data-bs-toggle="collapse" data-bs-target="#menu3">
    <i class="fas fa-bars"></i>
    Grupos de cuido por edades
</button>


<div class="collapse menu-items" id="menu3">
<ul class="list-group">
    <li class="nav-item">
        <form id="crearPerfilForm" method="get" action="{{ route('sections', ['option' => 'babyGroup']) }}">
            <input type="hidden" name="tipo" value="babyGroup">
            <button type="submit" class="btn panelRegistro">{{ __('Grupo de 0 a 2 años') }}
            <i class="fa-solid fa-children"></i>

            </button>
        </form>
        </li>

    <li class="nav-item">
    <form id="crearPerfilForm" method="get" action="{{ route('sections', ['option' => 'middleGroup']) }}">
        <input type="hidden" name="tipo" value="middleGroup">
        <button type="submit" class="btn panelRegistro">{{ __('Grupo de 3 a 4 años') }}
            <i class="fa-solid fa-children"></i>

        </button>
    </form>
    </li>

    <li class="nav-item">
    <form id="crearPerfilForm" method="get" action="{{ route('sections', ['option' => 'olderGroup']) }}">
        <input type="hidden" name="tipo" value="olderGroup">
        <button type="submit" class="btn panelRegistro">{{ __('Grupo de 5 a 6 años') }}
            <i class="fa-solid fa-children"></i>
        </button>
    </form>
    </li>
</ul>
</div>




{{-- fin de botones para ver los diferentes registros --}}

</ul>
</div>
</div>

</div>
