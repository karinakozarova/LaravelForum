@extends('layouts.app')

@section('content')
    <h3 class="title center"> Dashboard </h3> <br>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
