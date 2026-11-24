@extends('layouts.app')
@section('title', 'Add student')

@section('body')
<div class="wrap" style="max-width:720px">
    <div class="head"><div><h1>Add student</h1><p class="muted" style="margin:0">Basic details, profile and subjects.</p></div></div>

    @if (session('notice'))<div class="flash warn">{{ session('notice') }}</div>@endif

    <form method="POST" action="{{ route('students.store') }}" class="panel" data-once novalidate>
        @csrf
        <input type="hidden" name="_submit_token" value="{{ \App\Http\Middleware\PreventDoubleSubmit::issue() }}">

        <div class="row">
            <div class="field {{ $errors->has('name') ? 'has-err' : '' }}">
                <label for="name">Full name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus required>
                @error('name')<p class="err">{{ $message }}</p>@enderror
            </div>
            <div class="field {{ $errors->has('email') ? 'has-err' : '' }}">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')<p class="err">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="row">
            <div class="field {{ $errors->has('address') ? 'has-err' : '' }}">
                <label for="address">Address</label>
                <input id="address" type="text" name="address" value="{{ old('address') }}">
                @error('address')<p class="err">{{ $message }}</p>@enderror
            </div>
            <div class="field {{ $errors->has('phone') ? 'has-err' : '' }}">
                <label for="phone">Phone</label>
                <input id="phone" type="tel" name="phone" value="{{ old('phone') }}">
                @error('phone')<p class="err">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="field">
            <label>Subjects</label>
            <div class="checks">
                @forelse ($subjects as $subject)
                    <label class="check">
                        <input type="checkbox" name="subjects[]" value="{{ $subject->id }}"
                            @checked(in_array($subject->id, old('subjects', [])))>
                        {{ $subject->name }}
                    </label>
                @empty
                    <p class="muted">No subjects found. Run <code>php artisan db:seed</code>.</p>
                @endforelse
            </div>
        </div>

        <button type="submit" class="btn" data-busy="Saving…">Save student</button>
        <a href="{{ route('dashboard') }}" class="btn ghost">Cancel</a>
    </form>
</div>
@endsection
