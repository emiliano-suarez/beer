<div class="row">
          <div class="card small">
          <div class="row">
      <div class="col s12 m6">
    
    
            <div class="card-image">
              <img src="{{ $beer->photo_url }}">
              <span class="card-title">{{ $beer->name }}</span>
              {{ $beer->description }}
            </div>

      </div>
            <div class="card-content">
             <p>{{ $beer->description }}</p>
            </div>
            <div class="card-action">
              <a href="/cerveza/{{ $beer->slug }}">{{ $beer->name }}</a>
            </div>
          </div>
        </div>
      </div>

