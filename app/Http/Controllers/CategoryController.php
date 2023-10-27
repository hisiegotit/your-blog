<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryCollection;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Session;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return new CategoryCollection(Category::paginate(5));
        $categories = Category::all();
        return view('layouts.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
        ]);

        return redirect()->route('category.index')->with('success', 'New category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $categories = Category::all();
        $posts = Post::with('category')->where('category_id', $category->id)->paginate(5);
        $newest_posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $category = Category::find($category->id);
        $recommended_categories = Category::whereNotIn('id', [$category->id])->get();
        return view('layouts.pages.category', compact('posts'))->with(compact('categories', 'category', 'newest_posts', 'recommended_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::find($category->id);
        return view('layouts.category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
        ]);
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
