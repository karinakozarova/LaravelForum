<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

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
//        $categoriesCount = DB::table('category')->count();

//        $count = $users->count();
        $categoriesCount = Category::all()->count();
        $mainCategories = Category::with('children')->whereNull('parent_id')->get()->count();
        $usersCount = 20;

        return view('home', [ 'categoriesCount' => $categoriesCount, 'mainCategories' => $mainCategories, 'userCount' => $usersCount]);
    }
}
