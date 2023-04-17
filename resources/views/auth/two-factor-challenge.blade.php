<html>

<body>
    <h1>Type 2FA code:</h1>
    <form action="/two-factor-challenge" method="POST">
        @csrf
        <label for="code">Code: </label><input type="text" name="code">
        <input type="submit" value="Verify">
    </form>
</body>

</html>
