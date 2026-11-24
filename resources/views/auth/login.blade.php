@extends('layouts.guest')
@section('title', 'Log in')

@section('content')
    <h1>Log in</h1>
    <p class="muted">Use your account to open the records.</p>

    @if (session('notice'))<div class="flash warn">{{ session('notice') }}</div>@endif

    <form method="POST" action="{{ url('/login') }}" data-once novalidate>
        @csrf

        <div class="field {{ $errors->has('email') ? 'has-err' : '' }}">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username" autofocus required>
            @error('email')<p class="err">{{ $message }}</p>@enderror
        </div>

        <div class="field {{ $errors->has('password') ? 'has-err' : '' }}">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="current-password" required>
            @error('password')<p class="err">{{ $message }}</p>@enderror
        </div>

        <label class="check"><input type="checkbox" name="remember"> Keep me logged in</label>

        <button type="submit" class="btn block" data-busy="Logging in…" style="margin-top:.75rem">Log in</button>
    </form>

    <p class="alt">No account yet? <a href="{{ route('register') }}">Create one</a></p>
@endsection
