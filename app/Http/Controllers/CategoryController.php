<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Requests\FormCategoryRequest;

class CategoryController extends Controller
{
    public function index(): View
    {
        $title = "Liste des catégories";
        $categories = Category::paginate(10);
        return view('category.index', compact('title', 'categories'));
    }

    public function show(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $title = "Liste des tâches de la catégorie" . $category->name;
        $tasks = $category->tasks()->orderBy('date', 'asc')->paginate(10);
        return view('category.show', compact('title', 'category', 'tasks'));
    }

    public function create(): View
    {
        $title = "Création d'une catégorie";
        return view('category.create', compact('title'));
    }

    public function store(FormCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $category = Category::create($data);

        return redirect()->route('category.show', $category->slug);
    }

    public function edit(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $title = "Modification de la catégorie" . $category->name;

        return view('category.edit', compact('title', 'category'));
    }

    public function update(FormCategoryRequest $request, string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        if ($request->name !== $category->name) {
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'color' => $request->color,
            ]);
        } else {
            $category->update($request->validated());
        }

        return redirect()->route('category.show', $category->slug);
    }


    public function destroy(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->delete();
        return redirect()->route('category.index');
    }
}
