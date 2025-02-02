@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Welcome Back, {{ Auth::user()->name }}!</h1>
    <p>Manage your projects and tasks efficiently.</p>

    <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">View Projects</a>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">View Tasks</a>
</div>
@endsection
