<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Rejestracja</title>
</head>
<body>
    <div id="register_page"> 
        <h1>Zarejestruj się</h1>
	    <form action="scripts/register.php" method="POST">
            <label for="imie">Imię: </label> <br>
            <input type="text" name="imie" required> <br>
            <label for="nazwisko">Nazwisko: </label> <br>
            <input type="text" name="nazwisko" required> <br>
            <label for="adres">Adres: </label> <br>
            <input type="text" name="adres" required> <br>
            <label for="email">Email: </label> <br>
            <input type="email" name="email" required> <br>
            <label for="login">Login: </label> <br>
		    <input type="text" name="login" required> <br>
            <label for="haslo">Hasło: </label> <br>
		    <input type="password" name="haslo" required> <br>
		    <input type="submit"> 
	    </form>
        <?php
            if (!empty($_GET['error'])){
                echo "<p><b>".$_GET['error']."</b></p>";
            }
        ?>
    </div>
</body>
</html>