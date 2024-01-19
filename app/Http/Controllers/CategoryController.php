<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Category;
use App\Http\Requests\FormCategoryRequest;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function show(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $tasks = $category->tasks()->orderBy('date', 'asc')->get();
        return view('category.show', compact('category', 'tasks'));
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(FormCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return redirect()->route('category.show', $category->slug);
    }

    public function edit(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('category.edit', compact('category'));
    }

    public function update(FormCategoryRequest $request, string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->update($request->validated());
        return redirect()->route('category.show', $category->slug);
    }

    public function destroy(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->delete();
        return redirect()->route('category.index');
    }
}
