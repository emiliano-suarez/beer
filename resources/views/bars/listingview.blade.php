<div class="card hoverable small">
  <div class="card-image">
    <img src="{{ $bar->photo_url }}" alt="" data-focus-left=".30" data-focus-top=".12" data-focus-right=".79" data-focus-bottom=".66" />
    <span class="card-title">{{ $bar->name }}</span>
  </div>
  <div class="card-content">
    <p>{{ $bar->description }}</p>
  </div>
  <div class="card-action">
    <a href="/bar/{{ $bar->slug }}">{{ $bar->name }}</a>
    <a href='#'><i class="material-icons green-darken-4">comment</i></a>
    <span class="right"><a href='#'><i class="material-icons green-darken-4">favorite_border</i></a></span>
  </div>
</div>
