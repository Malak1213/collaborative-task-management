@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <!-- Overall Task Completion Progress -->
    @php
        $totalTasks = $tasks->count();
        $completedTasks = $tasks->where('status', 'done')->count();
        $taskProgress = ($totalTasks > 0) ? round(($completedTasks / $totalTasks) * 100) : 0;
    @endphp

    <div class="progress mt-2">
        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $taskProgress }}%;" aria-valuenow="{{ $taskProgress }}" aria-valuemin="0" aria-valuemax="100">
            {{ $taskProgress }}%
        </div>
    </div>
    <p class="mt-2">
        <strong>{{ $completedTasks }} out of {{ $totalTasks }} tasks completed</strong>
    </p>

    <div class="row mt-4">
        <!-- Tasks Summary -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Your Assigned Tasks</div>
                <div class="card-body">
                    @if($tasks->count() > 0)
                        <ul class="list-group">
                            @foreach ($tasks as $task)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $task->name }}
                                    <span class="badge bg-secondary">{{ ucfirst($task->status) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No tasks assigned to you.</p>
                    @endif
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-2">Manage Tasks</a>
                </div>
            </div>
        </div>

        <!-- Projects Summary -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Your Projects</div>
                <div class="card-body">
                    @if($projects->count() > 0)
                        <ul class="list-group">
                            @foreach ($projects as $project)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $project->name }}
                                    <span class="badge bg-primary">{{ $project->tasks->count() }} Tasks</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No projects created yet.</p>
                    @endif
                    <a href="{{ route('projects.index') }}" class="btn btn-primary mt-2">View Projects</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
