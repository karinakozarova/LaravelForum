@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <h2 class="center"> Edit the thread </h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="POST" action="{{ route('threads.update', $thread->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $thread->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" rows="8" cols="80" class="form-control">{{ $thread->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-outline-success btn-block">Save changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
