@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            {{ $thread->title }}
                            <a style="float: right" href="{{ route('threads.edit', $thread->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <p>{{ $thread->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection