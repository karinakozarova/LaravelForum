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