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
            </div>
            <div class="col-md-8">
                <h3 class="title center"> Dashboard </h3> <br>

                <div class="card">
                    <div class="card-header">New forum posts</div>
                    <div class="card-body">

                    </div>
                </div>
                <br> <br>
                <div class="card">
                    <div class="card-header">Recently commented</div>
                    <div class="card-body">

                    </div>
                </div>

                <br> <br>

                <div class="card">
                    <div class="card-header">Newly joined</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
