<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>IHS Portal</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Using Laravel Mix (webpack.mix.js) in this project -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Pass Laravel data to React -->
    <script>
        window.Laravel = {
            isAuthenticated: {{ auth()->check() ? 'true' : 'false' }},
            user: {!! auth()->check() ? json_encode([
                'id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]) : 'null' !!}
        };
    </script>

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app"></div>
</body>
</html>
