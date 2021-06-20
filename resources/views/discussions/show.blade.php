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

            {{--  {{ $discussions->links() }}  --}}
@endsection
