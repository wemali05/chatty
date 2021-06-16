@extends('layouts.app')

@section('content')

                 <div class="card mb-3">
                    <div class="card-header">
                         <div class="d-flex justify-content-between">
                            <div>
                                <img src="" width="40" height="40" style="border-radius: 50%" alt="Img">
                                <strong>{{ $discussion->author->name}}</strong>
                            </div>
                            <div>
                                <a class="btn btn-success" href="{{ route('discussions.show', $discussion->slug) }}">
                                View
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                          <h3>{{ $discussion->title }}</h3>
                          <hr>
                          <p>{!! $discussion->content !!}</p>
                    </div>
                </div>

            {{--  {{ $discussions->links() }}  --}}
@endsection
