<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Task;
use App\Models\Category;
use App\Http\Requests\FormTaskRequest;

class TaskController extends Controller
{
    public function index(): View
    {
        $title = "Liste des tâches";
        $tasks = Task::orderBy('date', 'asc')->paginate(10);
        return view('task.index', compact('title', 'tasks'));
    }

    public function show(string $slug): View
    {
        $task = Task::where('slug', $slug)->firstOrFail();
        $title = "Détails de la tâche" . $task->title;
        return view('task.show', compact('title', 'task'));
    }

    public function create()
    {
        $title = "Création d'une tâche";
        $categories = Category::all();

        return view('task.create', compact('title', 'categories'));
    }

    public function store(FormTaskRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        $task = Task::create($data);

        return redirect()->route('task.show', $task->slug);
    }

    public function edit(string $slug): View
    {
        $task = Task::where('slug', $slug)->firstOrFail();
        $title = "Modification de la tâche" . $task->title;
        $categories = Category::all();
        return view('task.edit', compact('title', 'task', 'categories'));
    }

    public function update(FormTaskRequest $request, string $slug)
    {
        $task = Task::where('slug', $slug)->firstOrFail();

        if ($request->title !== $task->title) {
            $task->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'category_id' => $request->category_id,
                'date' => $request->date,
            ]);
        } else {
            $task->update($request->validated());
        }

        return redirect()->route('task.show', $task->slug);
    }


    public function destroy(string $slug)
    {
        $task = Task::where('slug', $slug)->firstOrFail();
        $task->delete();
        return redirect()->route('task.index');
    }
}
