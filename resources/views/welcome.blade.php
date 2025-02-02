@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="display-4">Welcome to Task Manager</h1>
    <p class="lead">Manage your projects and tasks efficiently.</p>

    @guest
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
        <a href="{{ route('register') }}" class="btn btn-success btn-lg">Register</a>
    @else
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">Go to Dashboard</a>
    @endguest
</div>
@endsection
