<div class="card">
    <div class="card-header">Your information</div>
    <div class="card-body">
        <img src="/images/avatars/{{ Auth::user()->avatar }}" style="height:auto;width: 50%;display: block;margin-left:auto;margin-right:auto; margin-bottom: 20px; border-radius: 50%;"/>
        <center><h4>{{ Auth::user()->name }}</h4></center>
        <center><p class="text-primary">{{ Auth::user()->email }}</p></center>
        <br>

        <a href="{{ url('/profile/edit') }}" class="btn btn-success btn-block">Change profile info</a>
    </div>
</div>
