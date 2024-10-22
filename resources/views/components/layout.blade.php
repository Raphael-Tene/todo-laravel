<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="w-full h-full bg-gray-950">
    <x-nav/>
<main class="container text-gray-50 mt-4 mx-auto">
    {{ $slot }}
</main>
</body>
</html>
