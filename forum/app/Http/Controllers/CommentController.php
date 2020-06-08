<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Threads;
use App\Comment;

class CommentController extends Controller
{
    public function baseStore(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $thread = Threads::find($request->get('thread_id'));
        $thread->comments()->save($comment);
        return $comment;
    }

    public function store(Request $request)
    {
        self::baseStore($request);
        return back();
    }

    public function replyStore(Request $request)
    {
        $comment = self::baseStore($request);
        $comment->parent_id = $request->get('comment_id');
        $comment->save();
        return back();
    }
}
