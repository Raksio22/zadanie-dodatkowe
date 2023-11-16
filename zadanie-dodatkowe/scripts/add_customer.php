<?php
    $db = mysqli_connect("localhost","root","","erpdatabase");
    require("./validate.php");
    require("./addToHistory.php");

    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['address']) && !empty($_POST['email'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        if (isNotBlank($firstname) && isNotBlank($lastname) && isNotBlank($address) && isNotBlank($email)){
        $zapytanie = 'INSERT INTO customers VALUES ("","'.$firstname.'","'.$lastname.'","'.$address.'","'.$email.'");';

        $result = mysqli_query($db,$zapytanie);
            if($result){
                addToHistory("AddCustomer", $firstname." ".$lastname);
                header("location: ../index.php?error=Klient dodany pomyślnie");
            } else {
                header("location: ../index.php?error=Nie udało się dodać klienta");
            }
        } else {
            header("location: ../index.php?error=Informacje o kliencie nie mogą być puste");
        }
    } else {
        header("location: ../index.php?error=Brakuje danych o kliencie");
    }
    mysqli_close($db);
?>