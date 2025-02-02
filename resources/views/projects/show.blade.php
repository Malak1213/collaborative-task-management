@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>

    <div class="progress mt-2">
        <div class="progress-bar" role="progressbar" style="width: {{ $project->progress }}%;" aria-valuenow="{{ $project->progress }}" aria-valuemin="0" aria-valuemax="100">
            {{ $project->progress }}%
        </div>
    </div>

    <h3 class="mt-4">Tasks</h3>

    <!-- Show "Add Task" button only if the user is the project owner -->
    @if(Auth::id() === $project->owner_id)
        <a href="{{ route('tasks.create', ['project_id' => $project->id]) }}" class="btn btn-primary mb-3">Add Task to Project</a>
    @endif

    <ul class="list-group">
        @foreach ($project->tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>{{ $task->name }} - <strong>{{ ucfirst($task->status) }}</strong></span>
                <span>Assigned to: {{ $task->assignedUser?->name ?? 'Unassigned' }}</span>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
