<!DOCTYPE html>
<html lang="es">
<head>
    <title>{{ config('app.name', 'Nuestra Cerveza') }}</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/base.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="yellow lighten-5">

    <header>
        @if ( ! Auth::guest())
        <!-- Dropdown Structure -->
        <ul id="dropdown_login" class="dropdown-content">
            <li><a href="{{ url('/review') }}">Publicar una review</a></li>
            <li class="divider"></li>
            <li>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Salir
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>

        <ul id="dropdown_login_nav" class="dropdown-content">
            <li><a href="{{ url('/review') }}">Publicar una review</a></li>
            <li class="divider"></li>
            <li>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Salir
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
        @endif

        <nav>
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">Nuestra Cerveza!</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/bares">BARES</a></li>
                    <li><a href="#">CERVEZAS</a></li>
                    <li><a href='/fabricacion'>FABRICACION</a></li>
                    <li><a href='#'>CONSULTAS</a></li>
                    <!-- Dropdown Trigger -->
                    @if (Auth::guest())
                        <li><a href="/login">INGRESAR</a></li>
                    @else
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown_login">{{ Auth::user()->name }}
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    @endif
                </ul>

                <ul class="side-nav" id="mobile-demo">
                    <li><a href="/bares">BARES</a></li>
                    <li><a href="#">CERVEZAS</a></li>
                    <li><a href='/fabricacion'>FABRICACION</a></li>
                    <li><a href='#'>CONSULTAS</a></li>
                    <!-- Dropdown Trigger -->
                    @if (Auth::guest())
                        <li><a href="/login">INGRESAR</a></li>
                    @else
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown_login_nav">{{ Auth::user()->name }}
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <!-- footer -->
    <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Footer Content</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2016 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>
</body>
</html>
