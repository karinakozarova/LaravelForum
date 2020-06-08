@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Your information</div>
                    <div class="card-body">
                        <b> Your name: </b> {{ Auth::user()->name }} <br>
                        <b> Your email: </b> {{ Auth::user()->email }}
                        <br> <br>
                        <button class="button btn btn-success btn-block">
                            Change profile info
                        </button>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <b> Total number of active users: </b> {{$userCount}} <br>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <b> Main categories available: </b> {{$mainCategories}} <br>
                        <b> Sub categories available: </b> {{$categoriesCount - $mainCategories}}<br>
                        <b> Total: </b> {{$categoriesCount}}<br>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Newly joined</div>
                    <div class="card-body">
                        Our newest member is {{$latestUser->name}}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h3 class="title center"> Dashboard </h3> <br>

                <div class="card">
                    <div class="card-header">Newest thread </div>
                    <div class="card-body">
                        <h4>
                            {{ $thread->title }}
                        </h4>
                        <p>{{ $thread->description }}</p>
                        <a href="{{ route('threads.show', $thread->id) }}" class="btn btn-primary btn-block">Open thread</a>
                    </div>
                </div>
                <br> <br>
                <div class="card">
                    <div class="card-header">Recently commented</div>
                    <div class="card-body">
                        <h4>
                            {{ $commentThread->title }}
                        </h4>
                        <p>{{ $commentThread->description }}</p>



                        <a href="{{ route('threads.show', $commentThread->id) }}" class="btn btn-primary btn-block">Open thread</a>
                        <hr>
                        <h5> Latest comment on this thread: </h5>
                        <p>{{ $comment->body }}</p>
                    </div>
                </div>

                <br> <br>


            </div>
        </div>
    </div>
@endsection
