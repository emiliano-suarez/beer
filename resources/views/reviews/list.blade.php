<div class="media response-info">
    <div class="media-left response-text-left">
        <a href="#">
            <img class="media-object" src="{{ url('images/icon1.png') }}" alt=""/>
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
