<div class="media response-info">
    <div class="media-left response-text-left">
        <a href="#">
            @if ( $review->user_photo )
                <img class="media-object" height="64" width="64" src="{{ $review->user_photo }}" alt=""/>
            @else
                <img class="media-object" height="64" width="64" src="{{ url('images/icon1.png') }}" alt=""/>
            @endif
        </a>
        <h5><a href="#">{{ $review->user_name }}</a></h5>
    </div>
    <div class="media-body response-text-right">
        <p>{{ $review->text }}</p>
        <ul>
            <li>{{ $review->created_at }}</li>
            <li><a href="#">Responder</a></li>
        </ul>
    </div>
</div>
