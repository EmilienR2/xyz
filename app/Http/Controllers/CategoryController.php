<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index(): View
    {
        $categories = Category::all();
        return view('app.categories.index', compact('categories'));
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category): View
    {
        // Load related tracks if needed
        $category->load('tracks');

        return view('app.categories.show', compact('category'));
    }
}
