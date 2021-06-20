@extends('layouts.app')

@section('content')
            <div class="d-flex justify-content-end mb-2">
                <a class="btn btn-success" href="{{ route('discussions.create') }}">
                Add Discussion
                </a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    {{ __('You are logged in!') }}
                </div>
            </div>
@endsection
