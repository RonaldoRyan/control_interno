@extends('layouts.plantilla')

<h1>Hola {{ $user}},</h1>
<p>Estás recibiendo este correo electrónico porque hemos recibido una solicitud de restablecimiento de contraseña para tu cuenta.</p>
<h2>Ingresa al siguiente enlace para restablecer tu contraseña: <strong>{{ $token }}</strong></h2>
<p>Esta contraseña te permitirá iniciar sesión en tu cuenta.</p>
<hr>
<h3>Si no solicitaste un restablecimiento de contraseña, no se requiere ninguna acción adicional.</h3>
<p>¡Gracias!</p>
