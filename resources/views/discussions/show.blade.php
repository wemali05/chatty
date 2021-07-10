@extends('layouts.app')

@section('content')

    <div class="card mb-3">
        @include('partials.discussion-header')

        <div class="card-body">
                <h3>{{ $discussion->title }}</h3>
                <hr>
                <p>{!! $discussion->content !!}</p>
        </div>
    </div>

    @foreach ($discussion->replies()->paginate(3) as $reply)
        <div class="card my-5">
            <div class="card-header">
                <img src="{{$reply->owner->gravatar}}" width="40" height="40" style="border-radius: 50%"  alt="">
                <span>{{ $reply->owner->name}}</span>
            </div>
            <div class="card-body">
                <p>{!! $reply->content !!}</p>
            </div>
        </div>
    @endforeach
    {{ $discussion->replies()->paginate(3)->links() }}

    @auth
    <div class="card my-5">
        <div class="card-header">
            <span>Add a Reply</span>
        </div>
        <div class="card-body">
            <form action="{{ route('replies.store', $discussion->slug)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="content">Content</label>
                      
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>
                </div>

                <button type="submit" class="btn btn-small btn-success">Add Reply</button>
            </form>
        </div>
    </div>
    @else
        <a href="{{ route('login')}}" class="btn my-2 text-white btn-info">Sign In to Add a Reply</a>
    @endauth

@endsection

@section('css')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection