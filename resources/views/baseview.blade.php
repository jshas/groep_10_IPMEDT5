<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">

    <title>@yield('title')</title>
    {{-- Voeg: @section('title','De gewenste titel') toe aan het extend bestand om een een titel mee te geven in de extend. --}}
</head>
    <body class='body'>
        @yield('content')
    </body>
    <script src="/js/app.js" defer></script>
    @yield('additional-js-scripts')
</html>