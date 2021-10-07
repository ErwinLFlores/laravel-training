<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="/css/app.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h1>Dashboard</h1>

        <h2> Name: {{ $user->name }}</h2>
        <h2> Email: {{ $user->email }}</h2>

        <a href="{{ route('main.logout') }}">Logout</a>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
