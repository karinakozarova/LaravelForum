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
                @include('dashboard.sidebar')
            </div>
            <div class="col-md-8">
                @include('dashboard.content')
            </div>
        </div>
    </div>
@endsection
