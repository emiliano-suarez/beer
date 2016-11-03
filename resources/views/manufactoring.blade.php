@extends('layouts.app')

@section('content')

<body>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">dashboard</i></h2>
            <a href="#equipamiento" class="center brown-text"><h5 class="center">Equipamiento</h5></a>

            <p class="light"> Te mostramos los equipos que necesitas para convertirte en un alquimista de la cerveza! Sera un link a otra pagina o nos quedamos en esta?</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">assignment</i></h2>
            <a href="#recetas" class="center brown-text"><h5 class="center">Recetas</h5></a>

            <p class="light">Te compartimos los secretos para elaborar tu propia cerveza artesanal. Podras compartir tips?</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
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
    <div class="parallax"><img src="images/manufactured2.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 m8 l9 center"> <h3><i class="mdi-content-send brown-text"></i></h3>
          <a name = "equipamiento"><h5 class="center brown-text">Equipamiento</h5></a>
          <p class="left-align light">Te invitamos a conocer los equipamientos e ingredientes minimos para elaborar un batch de 20 litros</p>
          <ul class="collection">
            <li>Ollas con canilla en su base (3) y con falso fondo (1) - Probeta (1) -  Densimetro (1)</li>
            <li>Bomba sanitaria para alta tempratura(1) - Espumadera de cocina (1) - Air Lock (1) </li>
            <li> Enfriador (1) - Termometro de laboratorio (1) - Bidones Sparklin (2)</li>
            <li> Lupulo (33 gr. dividido en tres partes de 11 gr.)</li>
            <li> Malta (5kg) - Levadura para cerveza (1 sobre)</li>
            <li> Decantador (2 gr.) Irish Mosh o Whirflock</li>
            <li> Alcohol fino o de enfermeria al 70% (70% alcohol, 30% agua)</li>
  
          </ul>
        </div>
        <div class="col s12 m4 l3">
            <p>Quiero publicidades de Google</p>
            <img class="responsive-img" src="images/google.jpg" alt="Unsplashed background img 1">
        </div>
      
          <div class="col s12 m8 l9 center"><h3><i class="mdi-content-send brown-text"></i></h3>
          <a name = "recetas"><h5 class="center brown-text">Proceso de Elaboracion Basico </h5></a>
          <p class="left-align light">Emi se encarga =)</p>


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