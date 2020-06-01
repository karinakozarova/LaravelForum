@extends('layouts.app')

@section('content')

<a style="padding-top: -30px !important;" href="{{ route('threads.create') }}" class="btn btn-success btn-block">Create new thread</a>

<div class="container py-3">
    <div class="row">
        @foreach($threads as $thread)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $thread->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ substr($thread->description, 0, 100) }}</p>
                        <a href="{{ route('threads.show', $thread->id) }}" class="btn btn-primary btn-block">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
