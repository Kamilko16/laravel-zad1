<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body>
    <h1>Login screen</h1>
    @if (Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif
    @error('email')
        <p>Wrong password.</p>
    @enderror
    <form action="/login" method="POST">
        @csrf
        <label for="email">E-mail: </label><input type="email" name="email">
        <label for="password">Password: </label><input type="password" name="password">
        <input type="submit" value="Login">
    </form>
</body>

</html>
