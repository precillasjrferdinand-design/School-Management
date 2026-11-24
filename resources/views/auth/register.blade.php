@extends('layouts.guest')
@section('title', 'Create account')

@section('content')
    <h1>Create account</h1>
    <p class="muted">It takes a minute.</p>

    @if (session('notice'))<div class="flash warn">{{ session('notice') }}</div>@endif

    <form method="POST" action="{{ url('/register') }}" data-once novalidate>
        @csrf
        <input type="hidden" name="_submit_token" value="{{ \App\Http\Middleware\PreventDoubleSubmit::issue() }}">

        <div class="field {{ $errors->has('name') ? 'has-err' : '' }}">
            <label for="name">Full name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>
            @error('name')<p class="err">{{ $message }}</p>@enderror
        </div>

        <div class="field {{ $errors->has('email') ? 'has-err' : '' }}">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username" required>
            @error('email')<p class="err">{{ $message }}</p>@enderror
        </div>

        <div class="field {{ $errors->has('password') ? 'has-err' : '' }}">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="new-password" required>
            <p class="muted" style="font-size:.85rem;margin:.3rem 0 0">At least 8 characters, with letters and numbers.</p>
            @error('password')<p class="err">{{ $message }}</p>@enderror
        </div>

        <div class="field">
            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
        </div>

        <button type="submit" class="btn block" data-busy="Creating account…">Create account</button>
    </form>

    <p class="alt">Already registered? <a href="{{ route('login') }}">Log in</a></p>
@endsection
