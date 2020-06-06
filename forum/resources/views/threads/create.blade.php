@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <h2 class="center"> Add a new thread </h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="POST" action="{{ route('threads.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Title">
                        <input type="hidden" name="author_id" class="form-control" value="{{ auth()->user()->id }}">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">Select a Category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id === old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                                @if ($category->children)
                                    @foreach ($category->children as $child)
                                        <option value="{{ $child->id }}" {{ $child->id === old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name }}</option>
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" rows="4" cols="80" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-outline-success btn-block">Create Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
