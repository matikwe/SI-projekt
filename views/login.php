<html lang="pl-PL">
    <head>
        <link rel="stylesheet" href="./style/style.css">
        <title>Login</title>
    </head>
    <body>
        <div class="login">
            <div class="form">
                <h2>Login</h2>
                <form action="index.php?action=login" method="POST">
                    <label>
                        <input type="text" placeholder="Login">
                        <input type="password" placeholder="Hasło">
                        <a href="index.php?action=registration" class="info">Nie masz konta? Zarejestruj się...</a>
                        <input type="submit" value="Zaloguj" class="submit">
                    </label>
                </form>
            </div>
        </div>
    </body>
</html>