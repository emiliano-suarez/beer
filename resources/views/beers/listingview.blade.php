<div class="card hoverable small">
  <div class="card-image">
    <img src="{{ $beer->photo_url }}">
    <span class="card-title">{{ $beer->name }}</span>
  </div>
  <div class="card-content">
    <p>{{ $beer->description }}</p>
  </div>
  <div class="card-action">
    <a href="/beer/{{ $beer->slug }}">{{ $beer->name }}</a>
  </div>
</div>
