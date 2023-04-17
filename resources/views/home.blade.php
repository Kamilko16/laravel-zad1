{{-- Paginacja, żebye nie ładować 100k postów na raz, ewentualnie można zrobic lazy loading przy scrollowaniu z użyciem js --}}
{{ $posts = DB::table('posts')->paginate(20) }}
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1>Witaj - {{ Auth::user()->name }}</h1>
    <a href="/settings">Settings</a>
    <a href="/logout">Logout</a>
    <table>
        <tr>
            <td>id</td>
            <td>title</td>
            <td>date</td>
            <td>author</td>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created }}</td>
                <td>{{ $post->user_id }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
