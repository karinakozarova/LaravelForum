<hr>
@include('comments.addComment')
<br>
<hr>
<h4> Comments: </h4> <br>
@include('comments.comments', ['comments' => $thread->comments, 'thread_id' => $thread->id])
<hr>