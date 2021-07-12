@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">

                   
                <ul class="list-group">
                    @foreach($notifications as $notification)
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        @if( $notification->type === 'App\Notifications\NewReplyAdded' )
                         A new reply was Aded:
                        <strong class="font-weight-bold">{{ $notification->data['discussion']['title'] }}</strong>
                        <a href="{{ route('discussions.show', $notification->data['discussion']['slug'] )}}" class="btn btn-info text-white float-right">view Discusion</a>
                        @endif
                        @if( $notification->type === 'App\Notifications\ReplyMarkedAsBestReply')
                        Your reply was marked as Best Reply:
                        <strong class="font-weight-bold">{{ $notification->data['discussion']['title'] }}</strong>
                        <a href="{{ route('discussions.show', $notification->data['discussion']['slug'] )}}" class="btn btn-info text-white float-right">view Discusion</a>
                        @endif
                    </li>

                    @endforeach
                </ul>

                </div>
            </div>
@endsection
