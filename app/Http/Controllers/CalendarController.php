<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Task;
use App\Models\Category;

class CalendarController extends Controller
{
    public function index(): View
    {
        $title = "Calendrier";
        $tasks = Task::all();
        $categories = Category::all();

        return view('index', compact('title', 'tasks', 'categories'));
    }
}
