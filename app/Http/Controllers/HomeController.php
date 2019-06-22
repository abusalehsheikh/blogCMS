<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

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
        return view('home',[
            'postCount'        => Post::all()->count(),
            'userCount'        => User::all()->count(),
            'tagCount'         => Tag::all()->count(),
            'categoryCount'    => Category::all()->count(),
        ]);
    }
}
