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
        return view('welcome')
            ->with('categories',Category::all())
            ->with('tags',Tag::all())
            ->with('posts',Post::searched()->simplePaginate(4));
    }

}
