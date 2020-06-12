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
