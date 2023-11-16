<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Logowanie</title>
</head>
<body>
    <div id="login_page"> 
        <form action="scripts/login.php" method="POST">
                <label for="login">Login: </label> <br>
                <input type="text" name="login" required> <br>
                <label for="haslo">Hasło: </label> <br>
                <input type="password" name="haslo" required> <br>
                <input type="submit" name="submit" value="Zaloguj się">
        </form>
        <p>Nie masz konta? <a href="./register_page.php">Zarejestruj się</a></p>
        <?php
            if (!empty($_GET['error'])){
                echo "<p><b>".$_GET['error']."</b></p>";
            }
        ?>
    </div>
</body>
</html>