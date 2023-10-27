<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $posts = Post::limit(6)->get();
        $newest_posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $most_view_posts = Post::inRandomOrder()->limit(10)->get();
        return view('layouts.main', compact('categories', 'posts', 'newest_posts', 'most_view_posts'));
    }

    public function search()
    {
        $keywords = request()->keywords;
        $posts = Post::where('title', 'like', '%' . $keywords . '%')->orWhere('desc', 'like', '%' . $keywords . '%')->get();
        $categories = Category::all();
        return view('layouts.pages.search', compact('posts', 'categories'));
    }
}
