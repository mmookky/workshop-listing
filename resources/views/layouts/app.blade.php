<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', __('workshops.title'))</title>
    <link rel="stylesheet" href="{{ asset('css/workshops.css') }}">
</head>
<body class="workshop-list-page">
    @yield('content')

    <script src="{{ asset('js/workshops.js') }}"></script>
</body>
</html>
