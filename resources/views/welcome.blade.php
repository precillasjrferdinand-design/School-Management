@extends('layouts.guest')
@section('title', 'Welcome')

@section('content')
    <h1>Northeastern Cebu Colleges</h1>
    <p class="muted">Danao City, Cebu. Keep student profiles, subjects and course grades in one place.</p>

    <a href="{{ route('login') }}" class="btn block" style="margin-bottom:.6rem;text-align:center">Log in</a>
    <a href="{{ route('register') }}" class="btn ghost block" style="text-align:center">Create account</a>
@endsection
