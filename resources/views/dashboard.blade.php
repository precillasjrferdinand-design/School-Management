@extends('layouts.app')
@section('title', 'Dashboard')

@section('body')
<div class="wrap">
    @if (session('status'))<div class="flash ok">{{ session('status') }}</div>@endif
    @if (session('notice'))<div class="flash warn">{{ session('notice') }}</div>@endif

    <div class="head">
        <div>
            <h1>Dashboard</h1>
            <p class="muted" style="margin:0">Welcome back, {{ auth()->user()->name }}.</p>
        </div>
        <a href="{{ route('students.create') }}" class="btn">Add student</a>
    </div>

    <div class="stats">
        <div class="stat"><b>{{ $studentCount }}</b>Students</div>
        <div class="stat"><b>{{ $courseCount }}</b>Courses</div>
        <div class="stat"><b>{{ $subjectCount }}</b>Subjects</div>
    </div>

    <div class="panel">
        <h2>Students</h2>
        @if ($students->isEmpty())
            <div class="empty">
                <p class="muted">No students yet.</p>
                <a href="{{ route('students.create') }}" class="btn">Add the first student</a>
            </div>
        @else
            <table>
                <thead>
                    <tr><th>Name</th><th>Email</th><th>Phone</th><th>Subjects</th><th>Courses</th><th></th></tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->profile?->phone ?? '-' }}</td>
                        <td>{{ $student->subjects_count }}</td>
                        <td>{{ $student->courses_count }}</td>
                        <td><a href="{{ route('students.show', $student) }}">Open</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
