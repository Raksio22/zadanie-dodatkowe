<?php
    echo ("<nav id='account_menu'>");
        if (isset($_SESSION['username'])){
            echo "<h2>Witaj, ".$_SESSION['username']."</h2>";
            echo "<a href='./scripts/logout.php'>Wyloguj się</a>";
        } else {
            echo "<a href='./login_page.php'>Zaloguj się</a> <br>";
            echo "<a href='./register_page.php'>Zarejestruj się</a>";
        }
    echo ("</nav>");
?>