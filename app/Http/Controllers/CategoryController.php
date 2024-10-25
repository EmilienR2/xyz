<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::withCount('tracks')->get();
        return view('app.categories.index', compact('categories'));
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category): View
    {
        $tracks = $category->tracks()
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('app.categories.show', compact('category', 'tracks'));
    }
}
