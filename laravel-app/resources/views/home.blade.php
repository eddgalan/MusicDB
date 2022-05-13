<!DOCTYPE html>
<html>
<head>
    @include('template.index')
</head>
<body>
    @include('template.navbar')
    <h1> Home </h1>
    @auth
        <p>Bienvenido(a) <strong> {{ auth()->user()->name ?? auth()->user()->username }}</strong>.</p>
    @endauth

    @guest
        <p> Inicia sesión para ver el contenido. puedes registrarte en el siguiente <a href="{{ route('login') }}">link </a> </p>
    @endguest

    @include('template.scripts')
</body>
</html>
