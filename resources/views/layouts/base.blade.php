<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="base-url" content="{{ asset('/') }}">
  <title>Agenda telefonica</title>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">Agenda telefonica</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        @if(!empty(session()->get('user_session')))
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          @userRol(session()->get('user_session')['rol'])
          <li class="nav-item">
            <a class="nav-link" href="{{ route('create-contact') }}">Nuevo Contacto</a>
          </li>
          @enduserRol
        </ul>
        <div class="dropdown">
          <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ session()->get('user_session')['username'] }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar Sesión</a></li>
          </ul>
        </div>
        @else
        <span>Bienvenido</span>
        @endif
      </div>
    </div>
  </nav>


  @yield('content')

  <script src="{{ asset('/js/app.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.js') }}"></script>
  @yield('scripts')
</body>
</html>