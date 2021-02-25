<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Journal Entries</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="antialiased">
<div class="relative flex items-top min-h-screen bg-gray-100 dark:bg-gray-900 sm:pt-0">
    <div class="w-2/5 mx-auto my-8">
        <div id="app"></div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</div>
</body>
</html>
