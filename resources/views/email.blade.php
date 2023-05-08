@extends('layouts.plantilla');

<h1>Bienvenido a nuestro sitio</h1>

<p>Hola {{ $user->name }},</p>

<p>Tu cuenta ha sido creada con éxito. Tu contraseña es:</p>

<p><strong>{{ $password }}</strong></p>

<p>Por favor, guarda esta contraseña en un lugar seguro. Puedes cambiarla en cualquier momento en la sección de configuración de tu cuenta.</p>

<p>Gracias por unirte a nuestro sitio,</p>

<p>El equipo de nuestro sitio</p>
