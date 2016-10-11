<!DOCTYPE html>
<html lang="es">
<head>
    <title>{{ config('app.name', 'Nuestra Cerveza') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="Cerveza, Cerveza Artesanal, Fabricación de Cerveza, Bares" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/app.css" rel="stylesheet" type="text/css" media="all" />

    <link href='http://fonts.googleapis.com/css?family=Stint+Ultra+Condensed' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="/"><img src="images/logo.png" alt=""></a>
            </div>
            <div class="navigation">
                <span class="menu"><img src="images/menu-three.png" alt=""/></span>
                <ul class="nav1">
                    <li><a href="/bares">BARES</a></li>
                    <li><span></span></li>
                    <li><a href="products.html">CERVEZAS</a></li>
                    <li><span></span></li>
                    <li><a href="about.html">FABRICACION</a></li>
                    <li><span></span></li>
                    <li><a href="blog.html">CONSULTAS</a></li>
                    <li><span></span></li>
                    <li><a href="contact.html">CONTACTANOS</a></li>
                    <li><span></span></li>
                    <li><a href="typography.html">SERVICIOS</a></li>
                    <li><span></span></li>
                    @if (Auth::guest())
                        <li><a class="active" href="/login">INGRESAR</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/review') }}">Publicar una review</a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <script> 
                    $( "span.menu" ).click(function() {
                    $( "ul.nav1" ).slideToggle( 300, function() {
                     // Animation complete.
                    });
                    });
                </script>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="banner">
        @yield('content')
    </div>

    <div class="foot-line"></div>
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="footer-grids">
                <div class="col-md-3 footer-grid">
                    <h3>PERSPICIATIS</h3>
                    <ul>
                        <li><a href="#">SUMMER FEST</a></li>
                        <li><a href="#">CELEBRATIONS</a></li>
                        <li><a href="#">STOUT</a></li>
                        <li><a href="#">PALE ALE</a></li>
                        <li><a href="#">WINNERS</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h3>PRAESENTIUM </h3>
                    <ul>
                        <li><a href="#">PALE ALE</a></li>
                        <li><a href="#">SEASIONAL MEDALS</a></li>
                        <li><a href="#">PREMIUM LAGER BEERS</a></li>
                        <li><a href="#">SUMMER FEST</a></li>
                        <li><a href="#">STOUT</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h3>DIGNISSIMOS</h3>
                    <ul>
                        <li><a href="#">PREMIUM LAGER BEERS</a></li>
                        <li><a href="#">SUMMER FEST</a></li>
                        <li><a href="#">PALE ALE</a></li>
                        <li><a href="#">STOUT</a></li>
                        <li><a href="#">SEASIONAL MEDALS</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h3>PRAESENTIUM</h3>
                    <ul>
                        <li><a href="#">SEASIONAL MEDALS</a></li>
                        <li><a href="#">SUMMER FEST</a></li>
                        <li><a href="#">PALE ALE</a></li>
                        <li><a href="#">PREMIUM LAGER BEERS</a></li>
                        <li><a href="#">SUMMER FEST</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <!-- // scrolling icon -->
</body>
</html>
