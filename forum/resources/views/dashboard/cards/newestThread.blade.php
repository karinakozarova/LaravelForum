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