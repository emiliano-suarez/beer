@extends('layouts.app')

@section('content')

<body>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <a href="#equipamiento" class="center brown-text"><h5 class="center">Equipamiento</h5></a>

            <p class="light"> Te mostramos los equipos que necesitas para convertirte en un alquimista de la cerveza! Sera un link a otra pagina o nos quedamos en esta?</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <a href="#recetas" class="center brown-text"><h5 class="center">Recetas</h5></a>

            <p class="light">Te compartimos los secretos para elaborar tu propia cerveza artesanal. Podras compartir tips?</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <a href="#experiencia" class="center brown-text"><h5 class="center">La experiencia</h5></a>

            <p class="light">Vamos a subir videos de la experiencia desde San Pedro. Invitamos a los usuarios a subir su experiencia!</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Elaboracion</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="images/fabrica.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 m8 l9 center"> <h3><i class="mdi-content-send brown-text"></i></h3>
          <a name = "equipamiento"><h5 class="center brown-text">Equipamiento</h5></a>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
          <ul class="collection">
            <li>Maceradores - Enfriador </li>
            <li>Alvin</li>
            <li>Alvin</li>
          </ul>
        </div>
        <div class="col s12 m4 l3">
            <p>Quiero publicidades de Google</p>
            <img class="responsive-img" src="images/google.jpg" alt="Unsplashed background img 1">
        </div>
      
          <div class="col s12 m8 l9 center"><h3><i class="mdi-content-send brown-text"></i></h3>
          <a name = "recetas"><h5 class="center brown-text">Recetas </h5></a>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>


        </div>
        <div class="col s12 m4 l3">
            <p>Quiero publicidades de Google</p>
            <img class="responsive-img" src="images/google.jpg" alt="Unsplashed background img 1">
        </div>
        <div class="col s12 m8 l9 center"><h3><i class="mdi-content-send brown-text"></i></h3>
          <a name = "experiencia"><h5 class="center brown-text">La experiencia</h5> </a>
          <p class="left-align light">Estuvimos en San Pedro visitando a Martin y Marta, alquimistas locales!</p>
           <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/G3LvhdFEOqs" frameborder="0" allowfullscreen></iframe>
            </div>    
        </div>
        <div class="col s12 m4 l3">
            <p>Quiero publicidades de Google</p>
            <img class="responsive-img" src="images/google.jpg" alt="Unsplashed background img 1">
        </div>
      </div>

    </div>
  </div>



  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
      </div>
    </div>
  </div>

 

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
@endsection