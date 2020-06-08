<form method="post" action="{{ route('reply.add') }}">
    @csrf
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" name="comment_body" class="form-control"/>
            <input type="hidden" name="thread_id" value="{{ $thread_id }}"/>
            <input type="hidden" name="comment_id" value="{{ $comment->id }}"/>
            <div class="input-group-append">
                <input type="submit" class="btn btn-success" value="Reply"/>
            </div>
        </div>
    </div>
</form>