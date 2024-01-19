<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Task;
use App\Http\Requests\FormTaskRequest;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::orderBy('date', 'asc')->get();
        return view('task.index', compact('tasks'));
    }

    public function show(string $slug): View
    {
        $task = Task::where('slug', $slug)->firstOrFail();
        return view('task.show', compact('task'));
    }

    public function create(): View
    {
        return view('task.create');
    }

    public function store(FormTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return redirect()->route('task.show', $task->slug);
    }

    public function edit(string $slug): View
    {
        $task = Task::where('slug', $slug)->firstOrFail();
        return view('task.edit', compact('task'));
    }

    public function update(FormTaskRequest $request, string $slug)
    {
        $task = Task::where('slug', $slug)->firstOrFail();
        $task->update($request->validated());
        return redirect()->route('task.show', $task->slug);
    }

    public function destroy(string $slug)
    {
        $task = Task::where('slug', $slug)->firstOrFail();
        $task->delete();
        return redirect()->route('task.index');
    }
}
