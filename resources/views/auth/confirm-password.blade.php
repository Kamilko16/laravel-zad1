<html>

<body>
    <h1>Password confirm</h1>
    <form action="/user/confirm-password" method="POST">
        @csrf
        <label for="password">Password: </label><input type="password" name="password">
        <input type="submit" value="Verify">
    </form>
</body>

</html>
