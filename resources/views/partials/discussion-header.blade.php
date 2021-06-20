 <div class="card-header">
    <div class="d-flex justify-content-between">
        <div>
            <img  src="{{Auth::user()->gravatar}}" width="40" height="40" style="border-radius: 50%" alt="Img">
            <strong>{{ $discussion->author->name}}</strong>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('discussions.show', $discussion->slug) }}">
            View
            </a>
        </div>
    </div>
</div>