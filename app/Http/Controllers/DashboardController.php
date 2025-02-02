<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tasks = Task::where('assigned_to', $user->id)->get();
        $projects = Project::where('owner_id', $user->id)->get();

        return view('dashboard', compact('tasks', 'projects'));
    }
}
