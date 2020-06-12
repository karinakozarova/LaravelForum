<style>
    .display-comment .display-comment {
        margin-left: 2rem
    }
</style>
@foreach($comments as $comment)
    <div class="card border-dark">
        <div class="card-body">
            <div class="display-comment">
                <img src="/images/avatars/{{ $comment->user->avatar }}" style="height: 50px;width: 50px;display: inline-block; border-radius: 50%;"/>
                <h6 style="display: inline-block; margin-left: 5px;">{{ $comment->user->name }}</h6>
                <p>{{ $comment->body }}</p>
                @include('comments.addReply')
                @include('comments.comments', ['comments' => $comment->replies])
            </div>
        </div>
    </div> <br>
@endforeach
