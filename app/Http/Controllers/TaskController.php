<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index ()
    {
        $tasks = Task::orderBy('completed')->orderBy('important', 'desc')->latest()->paginate(3);
        return view('tasks.index', compact('tasks'));
    }

    public function complete (Task $task)
    {
        $task->update(['completed' => true, 'important' => 0]);
        session()->flash('completed', true);
        return redirect()->route('tasks.index');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $form_validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
            'important' => ['nullable']
        ]);
        Task::create($form_validated);
        return redirect()->route('tasks.index');
    }

}
