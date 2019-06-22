<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');

        if ($search){
            $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(1);
        }else{
            $posts = Post::simplePaginate(1);
        }

        return view('welcome')
            ->with('categories',Category::all())
            ->with('tags',Tag::all())
            ->with('posts',$posts);
    }

}
