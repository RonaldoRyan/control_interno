@extends('layouts.plantilla')

@section('content')
    <div class="container">
        <div class="alert alert-danger mt-5">
            <h3>Error de envío de correo</h3>
            <p>Hubo un problema al enviar el correo de confirmación. Por favor, registra tu correo electrónico en Mailgun para poder crear un usuario en nuestro sitio.</p>
            <p>Puedes seguir los siguientes pasos para registrar tu correo en Mailgun:</p>
            <ol>
                <li>Visita el sitio web de Mailgun en <a href="https://www.mailgun.com/" target="_blank">https://www.mailgun.com/</a>.</li>
                <li>Crea una cuenta gratuita o inicia sesión si ya tienes una.</li>
                <li>Verifica tu dominio y configura tus registros DNS según las instrucciones proporcionadas por Mailgun.</li>
                <li>Una vez configurado, intenta crear un usuario nuevamente en nuestro sitio.</li>
            </ol>
            <p>Si tienes alguna pregunta o necesitas ayuda adicional, no dudes en contactarnos.</p>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
@endsection
