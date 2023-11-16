<?php 
    session_start();
    require("./validate.php");

    $db = mysqli_connect("localhost","root","","erpdatabase");

    if(isset($_POST['login']) && isset($_POST['haslo'])){
        $login = validate($_POST['login']);
        $haslo = validate($_POST['haslo']);

        if (empty($login)){
            header("Location: ../login_page.php?error=Nazwa użytkownika jest wymagana");
            exit();
        } else if (empty($haslo)){
            header("Location: ../login_page.php?error=Hasło jest wymagane");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE username='".$login."' AND password='".$haslo."'";

            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] === $login && $row['password'] === $haslo) {
                    echo "Zalogowano!";

                    $_SESSION['username'] = $row['username'];
                    $_SESSION['type'] = $row['type'];
                    $_SESSION['id'] = $row['id'];

                    header("Location: ../index.php");
        } else{
            header("Location: ../login_page.php?error=Niepoprawna nazwa użytkownika lub hasło");
        }
    } else{
        header("Location: ../login_page.php?error=Niepoprawna nazwa użytkownika lub hasło");
    }
}
} else {
    header("Location: ../login_page.php?error=Coś poszło nie tak");
}
    mysqli_close($db);
?>