<div class="row">
  <div class="col s12 m6 l3">
    <div class="card hoverable small">
      <div class="card-image">
        <img src="{{ $beer->photo_url }}" alt="" data-focus-left=".30" data-focus-top=".12" data-focus-right=".79" data-focus-bottom=".66" />
      </div>
      <div class="card-content">
        <p>{{ $beer->type }}</p>
      </div>
      <div class="card-action">
        <a href="/cerveza/{{ $beer->slug }}">{{ $beer->name }}</a>
        <a href='#'><i class="material-icons green-darken-4">comment</i></a>
        <span class="right">
          <a href='#'>
            <i id="fav_{{ $beer->id }}" class="material-icons green-darken-4" onclick="favorite(this)">favorite_border</i>
          </a>
        </span>
      </div>
    </div>
  </div>
 <!-- 
 </div>
          
<div class="card hoverable small">
  <div class="card-image">
    <img src="{{ $beer->photo_url }}" alt="" data-focus-left=".30" data-focus-top=".12" data-focus-right=".79" data-focus-bottom=".66" />
    <span class="card-title">{{ $beer->name }}</span>
  </div>
  <div class="card-content">
    <p>{{ $beer->description }}</p>
  </div>
  <div class="card-action">
    <a href="/cerveza/{{ $beer->slug }}">{{ $beer->name }}</a>
    <a href='#'><i class="material-icons green-darken-4">comment</i></a>
    <span class="right"><a href='#'><i class="material-icons green-darken-4">favorite_border</i></a></span>
  </div>
</div> -->

       