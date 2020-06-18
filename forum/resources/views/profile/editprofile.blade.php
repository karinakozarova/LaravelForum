@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-auto mb-3 ml-3">
                                    <div class="row">
                                        <div class="mx-auto" style="width: 150px;">
                                            <img src="/images/avatars/{{ $user->avatar }}" style="width: 150px;height: 150px; float:left;"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mt-2 mb-2 mx-auto">
                                            <button id="change-avatar-btn" class="btn btn-primary" type="button">
                                                <i class="fa fa-fw fa-camera"></i>
                                                <span>Change Picture</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <h3 class="text-nowrap">{{ $user->name }}</h3>
                                    </div>
                                    <div class="text-center text-sm-right">
                                        <span class="badge badge-secondary">User</span>
                                        <div class="text-muted"><small>Joined {{ date('d M Y', AUTH::user()->created_at->timestamp) }}</small></div>
                                    </div>
                                </div>
                            </div>
                            <form class="needs-validation" novalidate id="edit-profile-form" enctype="multipart/form-data" action="/profile/edit" method="POST">
                                <input type="file" name="avatar" id="change-avatar-file-input" style="display: none;"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input class="form-control" id="edit-profile-form-name" type="text" name="name" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}" required
                                                    pattern="[A-Za-z ,.'-]{2,40}">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid name (Should not contain any digits).
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input type="checkbox" name="avatar_manipulation" value="image_manipulation">
                                                    <label for="avatar_manipulation">Circular avatar crop</label><br>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" id="edit-profile-form-email" type="text" placeholder="{{ Auth::user()->email }}" value="{{ Auth::user()->email }}" required
                                                    pattern='^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$'>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid e-mail.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-3">
                                        <div class="mb-2"><b>Change Password</b></div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Current Password</label>
                                                    <input class="form-control" name="current_password" type="password" placeholder="••••••" value="">
                                                    <span class="text-danger">@error('current_password') {{ $message }} @enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input class="form-control" name="new_password" type="password" placeholder="••••••" value="">
                                                    <span class="text-danger">@error('new_password') {{ $message }} @enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                                    <input class="form-control" name="confirmation_password" type="password" placeholder="••••••" value="">
                                                    <span class="text-danger">@error('confirmation_password') {{ $message }} @enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-end">
                                        <button id="edit-profile-submit" class="btn btn-primary" type="submit">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
