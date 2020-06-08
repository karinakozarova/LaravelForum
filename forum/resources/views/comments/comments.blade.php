<style>
    .display-comment .display-comment {
        margin-left: 2rem
    }
</style>
@foreach($comments as $comment)
    <div class="card border-dark">
        <div class="card-body">
            <div class="display-comment">
                <h6>{{ $comment->user->name }}</h6>
                <p>{{ $comment->body }}</p>
                @include('comments.addReply')
                @include('comments.comments', ['comments' => $comment->replies])
            </div>
        </div>
    </div> <br>
@endforeach