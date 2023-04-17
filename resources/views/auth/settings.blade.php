<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Settings</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body>
    <a href="/">Home</a>
    @if (auth()->user()->two_factor_secret)
        <h1>QR code:</h1>
        {!! auth()->user()->twoFactorQrCodeSvg() !!}
        <p>Manual add code:</p>
        <p>{{ decrypt(auth()->user()->two_factor_secret) }}</p>
        <h1>Recovery codes:</h1>
        @foreach (auth()->user()->recoveryCodes() as $code)
            <p>{{ $code }}</p>
        @endforeach
        <form action="/user/two-factor-authentication" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button type="submit">Disable 2FA</button>
        </form>
    @else
        <form action="/user/two-factor-authentication" method="post">
            @csrf
            <button type="submit">Enable 2FA</button>
        </form>
    @endif

</body>

</html>
