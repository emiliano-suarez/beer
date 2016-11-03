<div class="row">
    <div id="topic-{{ $topic->id }}" class="col m6 l8 offset-m0 offset-l2">
        <div id="{{ $topic->id }}" class="card" data-id="{{ $topic->id }}" data-title="{{ $topic->subject }}" data-source="" data-is-liked="" data-author="Tripti Sahu" data-is-bookmarked="" data-tags="{{ $topic->tags }}">
            <div class="card-content black-text">
                <div class="card-avatar">
                    <div class="avatar-img">
                        @if ( $topic->user_photo )
                            <img class="circle" src="{{ $topic->user_photo }}" />
                        @else
                            <img class="circle" src="{{ elixir('images/empty_profile.jpg') }}" />
                        @endif
                    </div>
                    <div class="avatar-text">
                        <span>Publicado por <a href="#">{{ $topic->user_name }}</a></span>
                    </div>
                </div>
                <a href="{{ $topic->topic_url }}">
                    <span class="card-title">{{ $topic->subject }}</span>
                    @if ( $topic->photo_url )
                        <img src="{{ $topic->photo_url }}" alt="{{ $topic->subject }}" class="topic-img">
                    @endif
                </a>
                <div class="content-text-read">
                    <p>{{ $topic->description }}</p>
                </div>
                <a href="{{ $topic->topic_url }}"><i>Leer más</i></a>
            </div>

            <div class="card-action">
                <div class="row">
                    <div class="col s6 left-align">
                        <a href="#modal-login" class="modal-trigger">
                            <i class="material-icons green-darken-4">favorite_border</i>
                            <span class="text">{{ $topic->likes_quantity }}</span>
                        </a>
                        <a href="#" class="comment" data-post="{{ $topic->id }}" data-url="{{ $topic->topic_url }}">
                            <i class="material-icons green-darken-4">chat_bubble_outline</i>
                            <span class="text">Comentar</span>
                        </a>
                    </div>

                    <div class="col s6 right-align">
                        <a class="social-share" data-post="{{ $topic->id }}" data-channel="facebook" href="{{ $topic->topic_url }}">
                            <i class="fa fa-facebook-official"></i>
                        </a>
                        <a class="social-share" data-post="{{ $topic->id }}" data-channel="twitter" href="https://twitter.com/home?status={{ $topic->subject }}+{{ $topic->topic_url }}">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
