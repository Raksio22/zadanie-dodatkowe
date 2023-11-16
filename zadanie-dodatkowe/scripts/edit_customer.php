<?php
    $currentTime = gmdate('Y-m-d h:i:s', time());
    //DO NAPRAWY - Można edytować na " " puste miejsce
    $db = mysqli_connect("localhost","root","","erpdatabase");
    require("./validate.php");
    require("./addToHistory.php");

    $klient = explode(' ', $_POST['klient']);
    $imieklienta = $klient[0];
    $nazwiskoklienta = $klient[1];

    $zapytanie1 = "SELECT * FROM customers WHERE firstname LIKE '".$imieklienta."'";

    $wynik = mysqli_query($db, $zapytanie1);

    $aktualnyklient = mysqli_fetch_assoc($wynik);

    if (!empty($aktualnyklient)){
        if (empty($_POST['imie']) and empty($_POST['nazwisko']) and empty($_POST['adres']) and empty($_POST['email'])){
            header("location: ../index.php?error=Nie wprowadzono żadnych zmian");
        } else {
            $aktualneimie = $aktualnyklient['firstname'];
            $aktualnenazwisko = $aktualnyklient['lastname'];
            $aktualnyadres = $aktualnyklient['address'];
            $aktualnyemail = $aktualnyklient['email'];

            $zapytanie2 = "UPDATE customers SET";
            $licznik = 0;

            if (!empty($_POST['imie'])){
                $aktualneimie = $_POST['imie'];
                $zapytanie2 = $zapytanie2." firstname = '".$aktualneimie."'";
                $licznik++;
            }

            if (!empty($_POST['nazwisko'])){
                $aktualnenazwisko = $_POST['nazwisko'];
                if ($licznik > 0) {
                    $zapytanie2 = $zapytanie2.",";
                }
                $zapytanie2 = $zapytanie2." lastname = '".$aktualnenazwisko."'";
                $licznik++;
            }

            if (!empty($_POST['adres'])){
                $aktualnyadres = $_POST['adres'];
                if ($licznik > 0) {
                    $zapytanie2 = $zapytanie2.",";
                }
                $zapytanie2 = $zapytanie2." address = '".$aktualnyadres."'";
                $licznik++;
            }

            if (!empty($_POST['email'])){
                $aktualnyemail = $_POST['email'];
                if ($licznik > 0) {
                    $zapytanie2 = $zapytanie2.",";
                }
                $zapytanie2 = $zapytanie2." email = '".$aktualnyemail."'";
            }

            if (isNotBlank($_POST['imie']) || isNotBlank($_POST['nazwisko']) || isNotBlank($_POST['address']) || isNotBlank($_POST['email'])){
                $zapytanie2 = $zapytanie2.' WHERE firstname LIKE "'.$imieklienta.'" and lastname LIKE "'.$nazwiskoklienta.'"';
                mysqli_query($db, $zapytanie2);

                addToHistory("EditCustomer", $aktualneimie." ".$aktualnenazwisko);
                header("location: ../index.php?error=Klient edytowany pomyślnie");
            }
        }
    } else {
        header("location: ../index.php?error=Nie ma takiego klienta w bazie");
    }

    mysqli_close($db);
?>