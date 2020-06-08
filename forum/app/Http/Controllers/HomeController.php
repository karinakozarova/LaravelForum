<?php

namespace App\Http\Controllers;

use App\Threads;
use Illuminate\Http\Request;
use App\Category;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categoriesCount = Category::all()->count();
        $mainCategories = Category::with('children')->whereNull('parent_id')->get()->count();
        $usersCount = DB::table('users')->get()->count();
        $thread = DB::table('threads')->orderBy('id', 'DESC')->first();
        $comment = DB::table('comments')->orderBy('id', 'DESC')->first();
        $latestUser = DB::table('users')->orderBy('id', 'DESC')->first();
        if (!is_null($comment)) {
            $commentThread = Threads::find($comment->commentable_id);
        } else {
            $commentThread = null;
        }

        return view('home', [
            'categoriesCount' => $categoriesCount,
            'mainCategories' => $mainCategories,
            'userCount' => $usersCount,
            'latestUser' => $latestUser,
            'thread' => $thread,
            'comment' => $comment,
            'commentThread' => $commentThread,
        ]);
    }
}
