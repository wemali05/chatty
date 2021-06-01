@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('discussion.store') }}">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea type="text" rows="3" class="form-control" id="content" name="content"></textarea>
                </div>
                 <div class="form-group">
                    <label for="channel">Channel</label>
                    <select class="form-control" id="channel">
                        @foreach($channels as $channel)
                            <option value="{{ $channel->id}}"> {{ $channel->name}} </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Create Discussion</button>
            </form>
        </div>    
    </div>
@endsection
