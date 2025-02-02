@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tasks</h1>

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

    <!-- Sorting Options -->
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-3">
        <label for="sort_by" class="form-label">Sort by:</label>
        <select name="sort_by" id="sort_by" class="form-select w-auto d-inline-block" onchange="this.form.submit()">
            <option value="priority" {{ request('sort_by') == 'priority' ? 'selected' : '' }}>Priority</option>
            <option value="due_date" {{ request('sort_by') == 'due_date' ? 'selected' : '' }}>Due Date</option>
        </select>
    </form>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>

    <ul class="list-group">
        @foreach ($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>
                    <strong>{{ $task->name }}</strong>
                    <small class="text-muted">({{ ucfirst($task->priority) }})</small>
                    @if($task->due_date)
                        <span class="badge bg-warning">Due: {{ $task->due_date }}</span>
                    @endif
                    @if($task->project)
                        <span class="badge bg-secondary">Project: {{ $task->project->name }}</span>
                    @endif
                </span>
                <div>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
