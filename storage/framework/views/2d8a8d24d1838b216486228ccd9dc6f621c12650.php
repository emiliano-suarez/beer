<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo e(config('app.name', 'Nuestra Cerveza')); ?></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->

    <link rel="stylesheet" href="<?php echo e(elixir('css/materialize.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(elixir('css/base.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <script type="text/javascript" src="<?php echo e(elixir('js/jquery-2.2.4.min.js')); ?>"></script>
   <!-- <script type="text/javascript" src="<?php echo e(elixir('js/jquery-3.1.1.min.js')); ?>"></script>-->
    <script type="text/javascript" src="<?php echo e(elixir('js/materialize.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(elixir('js/base.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(elixir('js/map.js')); ?>"></script>

    <!-- Scripts -->
    <script>
        //<![CDATA[
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
        //]]>
    </script>
</head>

<body class="yellow lighten-5">
<!--  Facebook sdk for Javascript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--  Facebook sdk for Javascript -->


    <header>
        <?php if( ! Auth::guest()): ?>
        <!-- Dropdown Structure -->
        <ul id="dropdown_login" class="dropdown-content">
            <li><a href="<?php echo e(url('/review')); ?>">Publicar una review</a></li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Salir
                </a>
                <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </li>
        </ul>

        <?php endif; ?>


    <div class="navbar-fixed">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a href="/" class="brand-logo">LOGO</a>
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>

                    <ul class="right hide-on-med-and-down">
                        <li><a href="/bares">BARES</a></li>
                        <li><a href="/cervezas">CERVEZAS</a></li>
                        <li><a href='/fabricacion'>FABRICACION</a></li>
                        <li><a href='/consultas'>CONSULTAS</a></li>
                        <!-- Dropdown Trigger -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="#modalLogin" class="modal-trigger">INGRESAR</a></li>
                        <?php else: ?>
                            <li>
                                <a class="dropdown-button" href="#!" data-activates="dropdown_login"><?php echo e(Auth::user()->name); ?>

                                    <i class="material-icons right">arrow_drop_down</i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    
        <ul class="side-nav" id="slide-out">
            <div class="userView">
              <img class="background" src="<?php echo e(elixir('images/profile_background_original.jpg')); ?>" />
            <?php if( ! Auth::guest()): ?>
              <a href="#!user"><img class="circle" src="<?php echo e(Auth::user()->profile_photo); ?>" /></a>
              <a href="#!name"><span class="white-text name"><?php echo e(Auth::user()->name); ?></span></a>
              <a href="#!email"><span class="white-text email"><?php echo e(Auth::user()->email); ?></span></a>
            <?php endif; ?>
            </div>
            <li><a href="/"><i class="material-icons green-darken-4">home</i>HOME</a></li>
            <li><a href="/bares"><i class="material-icons green-darken-4">room</i>BARES</a></li>
            <li><a href="/cervezas"><i class="material-icons green-darken-4">local_drink</i>CERVEZAS</a></li>
            <li><a href='/fabricacion'><i class="material-icons green-darken-4">store</i>FABRICACION</a></li>
            <li><a href='/consultas'><i class="material-icons green-darken-4">question_answer</i>CONSULTAS</a></li>
            <li><div class="divider"></div></li>
            <!-- Dropdown Trigger -->
            <?php if(Auth::guest()): ?>
                <li><a class="modal-trigger" href="#modalLogin"><i class="material-icons">power_settings_new</i>INGRESAR</a></li>
            <?php else: ?>
                <li>
                    <a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="material-icons">power_settings_new</i>Salir
                    </a>
                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </header>

    <!-- Login Modal  -->
   <?php echo $__env->make('modals.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <?php echo $__env->make('auth.passwords.email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

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
                <!-- Compartir en facebook  -->
                <li>
            <div class="fb-share-button" data-href="http://www.beer-dev.com/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.beer-dev.com%2F&amp;src=sdkpreparse">Compartir</a></div>
            </li>
                <!-- Enviar por Messenger de Facebook -->
                <li>
            <div class="fb-send" 
        data-href="www.beer-dev.com" 
        data-layout="button_count">
    </div>    
</li>
             
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
