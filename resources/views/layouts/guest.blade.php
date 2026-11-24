<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') · </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-ncc">
<main class="auth">
    <span class="brand-big"></span>
    <div class="panel">
        @yield('content')
    </div>
</main>
@include('layouts.once-script')
</body>
</html>
