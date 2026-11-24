<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Student Records')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-dash">
@auth
    <header class="topbar">
        <div class="topbar-in">
            <a href="{{ route('dashboard') }}" class="brand">Student Records</a>
            <a href="{{ route('dashboard') }}" class="nav">Dashboard</a>
            <a href="{{ route('students.create') }}" class="nav">Add student</a>
            <span class="muted">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button class="btn ghost small">Log out</button>
            </form>
        </div>
    </header>
@endauth

@yield('body')

@include('layouts.once-script')
</body>
</html>
