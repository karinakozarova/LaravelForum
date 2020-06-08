<div class="card border-dark">
    <div class="card-body">
        <h4>Add comment: </h4>
        <form method="post" action="{{ route('comment.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" required/>
                <input type="hidden" name="thread_id" value="{{ $thread->id }}"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Add Comment"/>
            </div>
        </form>
    </div>
</div>