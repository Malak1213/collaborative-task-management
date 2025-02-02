@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $task->name }}</h1>
    <p>{{ $task->description }}</p>
    <p><strong>Priority:</strong> {{ ucfirst($task->priority) }}</p>
    <p><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
    <p><strong>Due Date:</strong> {{ $task->due_date ?? 'Not set' }}</p>

    @if($task->project)
        <p><strong>Project:</strong> {{ $task->project->name }}</p>
    @endif

    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit Task</a>
</div>
@endsection
