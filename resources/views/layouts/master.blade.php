<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="/css/app.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/home">Laravel Training</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item {{ ($navigation == 'home' || empty($navigation))? 'active' : '' }}">
                <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ ($navigation == 'topic')? 'active' : '' }}">
                <a class="nav-link" href="/topic-list">Topic</a>
            </li>
            <li class="nav-item {{ ($navigation == 'about')? 'active' : '' }}">
                <a class="nav-link" href="/about">About</a>
            </li>

            </ul>
        </div>


    </nav>

    @yield('content')

    <script src="/js/app.js"></script>
</body>
</html>
