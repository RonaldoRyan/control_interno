@extends('layouts.plantilla')


@section('styles')

    <style>
        :root {
            --primary-color: #5DA399;
            --accent-color: #FF6B6B;
            --text-color: #333333;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            background-color: var(--primary-color);
            padding: 20px;
            margin-bottom: 20px;
            color: #000000;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        h2 {
            color: var(--primary-color);
            margin-top: 15px;
            margin-bottom: 10px;
            text-align: center;

        }

        h3 {
            color: var(--accent-color);
            margin-top: 15px;
            margin-bottom: 10px;

        }

        p {
            margin-bottom: 10px;
        }

        .personal-info,
        .parents-info,
        .emergency-info,
        .additional-info {
            margin-bottom: 20px;
        }

        .parent {
            margin-bottom:10px;
            padding-left: 20px;
        }

        footer {
            margin-top: 80px;
            text-align: center;
            color: #000000;
            background-color: var(--primary-color);
            padding: 20px;
        }


        .logo {
        width: 100px;
        height: auto;
    }




    </style>
     <head>

    <title>Datos Personales de: {{ $student->name }}</title>

     </head>


    @endsection

    @section('content')



    <div>

    <img src="imgs/logo.png" width="100px" height="100px">

   </div>






    <div class="container">
        <header style="background-color: #56A4FD">
            <h1>Cecudi: Manuel Mora</h1>
            <h2>Ficha de datos de: {{$student->name}}</h2>


        </header>

        <div class="student-info">
            <div class="personal-info">
                <hr>
                <h2 style="background-color:  #FFDCC4">Información del menor</h2>
                <hr>
                <p><strong>Nombre:</strong> {{ $student->name }}</p>
                <p><strong>Edad:</strong> {{ $student->age }}</p>
                <p><strong>Fecha de Nacimiento:</strong> {{ $student->birth_date }}</p>
                <p><strong>Direccion:</strong> {{ $student->address }}</p>
                <p><strong>Tipo de Beneficio:</strong> {{ $student->benefits }}</p>


            </div>


            <div class="parents-info">

                <hr>
                <h2  style="background-color:  #FFDCC4">Información de los Padres</h2>
                <hr>

                <div class="parent"   style="border: solid 1px black">
                    <h3>Madre</h3>
                    <p><strong>Nombre:</strong> {{ $student->mom_name }}</p>
                    <p><strong>Teléfono:</strong> {{ $student->mom_phone }}</p>
                    <p><strong>Cédula:</strong> {{ $student->idNumber_mom }}</p>
                </div>


                <div class="parent"   style="border: solid 1px black">
                    <h3>Padre</h3>
                    <p><strong>Nombre:</strong> {{ $student->dad_name }}</p>
                    <p><strong>Teléfono:</strong> {{ $student->dad_phone }}</p>
                    <p><strong>Cédula:</strong> {{ $student->idNumber_dad }}</p>
                </div>
            </div>
            <div class="emergency-info">
                <hr>
                <h2 style="background-color:  #FFDCC4">Información de Contacto de Emergencia</h2>
                <hr>
                <p><strong>Nombre:</strong> {{ $student->emergency_contact }}</p>
                <p><strong>Cédula:</strong> {{ $student->emergency_Idcontact }}</p>
                <p><strong>Teléfono:</strong> {{ $student->emergency_contact_phone }}</p>
            </div>
            <div class="additional-info">
                <hr>
                <h2  style="background-color:  #FFDCC4">Información Adicional</h2>
                <hr>
                <p><strong>Información de Vacunas:</strong> {{ $student->vaccine_information }}</p>
                <p><strong>Alergias o Condiciones Especiales:</strong> {{ $student->allergies_or_conditions }}</p>
            </div>
        </div>

        <!-- Agrega aquí cualquier otro contenido adicional que desees mostrar en el PDF -->

        <footer style="background-color:  #56A4FD">
            <h5>Documento generado mediante www.CecudiControlInterno.com para uso exclusivo del centro</h5>
        </footer>
    </div>



@endsection

