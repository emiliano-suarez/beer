@extends('layouts.app')

<!DOCTYPE html>
  <html>
   <head>
    
    
   </head>
   @section('content')
      <title>The Materialize Typography Example</title>
      
   <body class="container"> 
     @if ($beer)
       <h3 class "type">
       <p class="flow-text">
      {{ $beer[0]->name }}
      </p>
    @else
        <p>No encontramos resultados para tu búsqueda... =(</p>
    @endif
      </h3>
    <hr/>
      
      <div class="card-panel">
         <blockquote>
                   <p class="flow-text">

          INFO DE LA BIRRA
         </blockquote>
         </p>
      </div>
    
      </div>      
   </body>
</html>


@endsection