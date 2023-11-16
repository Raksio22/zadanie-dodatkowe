<?php
    $db = mysqli_connect("localhost", "root", "", "erpdatabase");
    require("./validate.php");
		
    if (isset($_POST['login']) && isset($_POST['haslo']) && isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['adres']) && isset($_POST['email'])){    
    $login = validate($_POST['login']);
    $haslo = validate($_POST['haslo']); 

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];
    $email = $_POST['email'];

    if (empty($login)){
        header("location: ../register_page?error=Nazwa użytkownika jest wymagana");
    } else if (empty($haslo)){
        header("location: ../register_page?error=Hasło jest wymagane");
    } else{
        $sql = "SELECT * FROM users WHERE username LIKE '".$login."'";
        $result = mysqli_query($db, $sql);
        $data = mysqli_fetch_assoc($result);
        
        if (empty($data)){
            $sql2 = "INSERT INTO users VALUES (null,'".$login."','".$haslo."', 'klient')";
            $result2 = mysqli_query($db, $sql2);
            if ($result2){
                $sql3 = "INSERT INTO customers VALUES ('', '".$imie."','".$nazwisko."','".$adres."','".$email."','".$login."');";
                mysqli_query($db, $sql3);

                header("location: ../index.php?error=Konto założone pomyślnie");
            } else {
                header("location: ../register_page.php?error=Nie udało się założyć konta");
            }
        } else {
            header("location: ../register_page.php?error=Użytkownik z taką nazwą już jest w bazie");
        }
    }
}		
    mysqli_close($db);
?>