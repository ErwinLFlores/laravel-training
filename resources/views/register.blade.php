<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="/css/app.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h1>Register</h1>

        @if(Session::has('user_created'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('user_created') }}
            </div>
        @endif

        <form method="POST" action="{{ route('main.saveuser') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

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
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>

    <script src="/js/app.js"></script>
</body>

</html>
