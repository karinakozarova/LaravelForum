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