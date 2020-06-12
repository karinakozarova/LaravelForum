@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            {{ $thread->title }}
                            @if ($thread->author_id == Auth::id())
                                <form id="thread-delete" action="{{ route('threads.destroy' , $thread->id)}}" method="POST">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <button id="delete-button" type="submit" class="btn btn-danger" style="float: right; margin-left: 5px;"><i class="fa fa-trash"></i></button>
                                    </div>
                                </form>

                                <a style="float: right" href="{{ route('threads.edit', $thread->id) }}"
                                   class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                            @endif
                        </h4>
                        <p class="text-muted"> Category: {{ $thread->category->name }}</p>
                    </div>

                    <div class="card-body">
                        <p>{!! parsedown($thread->description) !!}</p>
                    </div>
                </div>
                @include('comments.postComments')
            </div>
        </div>
    </div>
@endsection
