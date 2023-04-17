<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Settings</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex flex-column h-100">
    <x-nav-bar />
    <div class="container-fluid overflow-auto">
        <div class="container">
            <h1 class="mt-3 mb-3">Two Factory Authentication</h1>
            @if (session('status') == 'two-factor-authentication-enabled')
                <div class="alert alert-secondary" role="alert">
                    Please finish configuring two factor authentication below.
                </div>
            @endif
            @if (sizeof($errors->getBag('confirmTwoFactorAuthentication')->get('code')) == 1)
                <div class="alert alert-danger" role="alert">
                    Wrong code.
                </div>
            @endif
            @if (session('status') == 'two-factor-authentication-enabled' ||
                    sizeof($errors->getBag('confirmTwoFactorAuthentication')->get('code')) == 1)

                <h2 class="mt-2 mb-2">QR code:</h2>
                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                <h2 class="mt-2 mb-2">Manual add code:</h2>
                <p>{{ decrypt(auth()->user()->two_factor_secret) }}</p>
                <form style="max-width: 300px;" action="/user/confirmed-two-factor-authentication" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="code" class="form-control" id="floatingCode" placeholder="Code"
                            required>
                        <label for="floatingCode">Code</label>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Verify</button>
                </form>
                <form style="max-width: 300px;" action="/user/two-factor-authentication" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="w-100 btn btn-danger">Cancel</button>
                </form>
                <h2 class="mt-2 mb-2">Recovery codes:</h2>
                @foreach (auth()->user()->recoveryCodes() as $code)
                    <p>{{ $code }}</p>
                @endforeach
            @endif
            @if (session('status') == 'two-factor-authentication-confirmed')
                <div class="alert alert-success" role="alert">
                    2FA was succesfully enabled.
                </div>
            @endif
            @if (session('status') == 'two-factor-authentication-disabled')
                <div class="alert alert-success" role="alert">
                    2FA was succesfully disabled.
                </div>
            @endif
            @if (sizeof($errors->getBag('confirmTwoFactorAuthentication')->get('code')) == 0 && session('status') != 'two-factor-authentication-enabled')
                @if (auth()->user()->two_factor_secret)
                    <form action="/user/two-factor-authentication" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Disable 2FA</button>
                    </form>
                @else
                    <form action="/user/two-factor-authentication" method="post">
                        @csrf

                        <button type="submit" class="btn btn-primary">Enable 2FA</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
</body>

</html>
