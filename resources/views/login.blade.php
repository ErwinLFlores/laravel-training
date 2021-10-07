<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <h1>Login</h1>

        @if(Session::has('fail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('fail') }}
            </div>
        @endif

        <form method="POST" action="{{ route('main.check') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
                <span class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label>Passowrd</label>
                <input type="password" name="password" class="form-control">
                <span class="text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

    </div>

    <script src="/js/app.js"></script>
</body>

</html>
