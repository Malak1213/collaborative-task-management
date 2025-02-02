@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Task</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="hidden" name="project_id" value="{{ request('project_id') }}">

        <div class="mb-3">
            <label for="name" class="form-label">Task Name</label>
            <input id="name" type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Task Description</label>
            <textarea id="description" class="form-control" name="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input id="due_date" type="date" class="form-control" name="due_date">
        </div>

        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select class="form-control" id="priority" name="priority">
                <option value="low">Low</option>
                <option value="medium" selected>Medium</option>
                <option value="high">High</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="to do">To Do</option>
                <option value="in progress">In Progress</option>
                <option value="done">Done</option>
            </select>
        </div>

        @if(request('project_id') && auth()->id() === \App\Models\Project::find(request('project_id'))->owner_id)
            <div class="mb-3">
                <label for="assigned_to" class="form-label">Assign to User</label>
                <select class="form-control" id="assigned_to" name="assigned_to">
                    <option value="">Unassigned</option>
                    @foreach(\App\Models\User::all() as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Create Task</button>

            @if(request('project_id'))
                <a href="{{ route('projects.show', request('project_id')) }}" class="btn btn-danger">Cancel</a>
            @else
                <a href="{{ route('tasks.index') }}" class="btn btn-danger">Cancel</a>
            @endif
        </div>
    </form>
</div>
@endsection
