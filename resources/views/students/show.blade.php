@extends('layouts.app')
@section('title', $student->name)

@section('body')
<div class="wrap">
    @if (session('status'))<div class="flash ok">{{ session('status') }}</div>@endif
    @if (session('notice'))<div class="flash warn">{{ session('notice') }}</div>@endif

    <div class="head">
        <div>
            <h1>{{ $student->name }}</h1>
            <p class="muted" style="margin:0">{{ $student->email }}</p>
        </div>
        <form method="POST" action="{{ route('students.destroy', $student) }}" data-once
              onsubmit="return confirm('Delete this student and all their courses?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn danger small">Delete student</button>
        </form>
    </div>

    <div class="cols" style="margin-bottom:1.25rem">
        <div class="panel">
            <h2>Profile</h2>
            <dl>
                <dt>Address</dt><dd>{{ $student->profile?->address ?: '-' }}</dd>
                <dt>Phone</dt><dd>{{ $student->profile?->phone ?: '-' }}</dd>
            </dl>
        </div>
        <div class="panel">
            <h2>Subjects</h2>
            @if ($student->subjects->isEmpty())
                <p class="muted" style="margin:0">Not enrolled in any subject.</p>
            @else
                <ul class="tags">@foreach ($student->subjects as $subject)<li>{{ $subject->name }}</li>@endforeach</ul>
            @endif
        </div>
    </div>

    <div class="panel">
        <h2>Courses</h2>

        @if ($student->courses->isEmpty())
            <p class="muted">No courses recorded yet.</p>
        @else
            <table style="margin-bottom:1.25rem">
                <thead><tr><th>Title</th><th>Grade</th></tr></thead>
                <tbody>
                @foreach ($student->courses as $course)
                    <tr><td>{{ $course->title }}</td><td>{{ $course->grade !== null ? (float) $course->grade : '-' }}</td></tr>
                @endforeach
                </tbody>
            </table>
        @endif

        <form method="POST" action="{{ route('students.courses.store', $student) }}" data-once novalidate>
            @csrf
            <input type="hidden" name="_submit_token" value="{{ \App\Http\Middleware\PreventDoubleSubmit::issue() }}">
            <div class="row" style="grid-template-columns:2fr 1fr">
                <div class="field {{ $errors->has('title') ? 'has-err' : '' }}">
                    <label for="title">Course title</label>
                    <input id="title" type="text" name="title" value="{{ old('title') }}" required>
                    @error('title')<p class="err">{{ $message }}</p>@enderror
                </div>
                <div class="field {{ $errors->has('grade') ? 'has-err' : '' }}">
                    <label for="grade">Grade (0-100)</label>
                    <input id="grade" type="number" step="0.01" name="grade" value="{{ old('grade') }}">
                    @error('grade')<p class="err">{{ $message }}</p>@enderror
                </div>
            </div>
            <button type="submit" class="btn small" data-busy="Adding…">Add course</button>
        </form>
    </div>
</div>
@endsection
