<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>2FA confirm</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <style>
        .form-signin {
            max-width: 330px;
            padding: 15px;
        }
    </style>
</head>

<body class="d-flex text-center align-items-center bg-light">
    <form class="form-signin w-100 m-auto" action="/two-factor-challenge" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please center 2FA code</h1>
        <div class="form-floating mb-3">
            <input type="text" name="code" class="form-control" id="floatingCode" placeholder="Code"
                required>
            <label for="floatingCode">Code</label>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        @error('code')
            <div class="alert alert-danger" role="alert">
                Wrong code.
            </div>
        @enderror
        <button class="w-100 btn btn-lg btn-primary" type="submit">Verify</button>
    </form>
</body>

</html>
