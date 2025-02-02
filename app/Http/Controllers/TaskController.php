<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->query('sort_by', 'priority'); // Default sorting by priority

        $tasks = Task::where('created_by', auth()->id())
            ->orderBy($sortBy, ($sortBy == 'priority') ? 'asc' : 'desc') // Sorting logic
            ->get();

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create', ['projects' => Project::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to do,in progress,done',
            'project_id' => 'nullable|exists:projects,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'status' => $request->status,
            'project_id' => $request->project_id,
            'assigned_to' => $request->assigned_to,
            'created_by' => auth()->id(),
        ]);

        // Redirect back to the project page if inside a project
        if ($request->project_id) {
            return redirect()->route('projects.show', $request->project_id)->with('success', 'Task added successfully!');
        } else {
            return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
        }
    }


    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:to do,in progress,done'
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
