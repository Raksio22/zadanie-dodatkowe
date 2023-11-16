<?php
    //DO NAPRAWY - Można edytować na " " puste miejsce
    $db = mysqli_connect("localhost","root","","erpdatabase");
    require("./addToHistory.php");

    $produkt = $_POST['produkt'];

    $zapytanie1 = "SELECT * FROM products WHERE name LIKE '".$produkt."'";

    $wynik = mysqli_query($db, $zapytanie1);

    $aktualnyprodukt = mysqli_fetch_assoc($wynik);

    if (!empty($aktualnyprodukt)){
        if(empty($_POST['nazwa']) and empty($_POST['opis']) and empty($_POST['cena']) and empty($_POST['dostepnosc'])){
            header("location: ../index.php?error=Nie wprowadzono żadnych zmian");
        } else {

            $aktualnanazwa = $aktualnyprodukt['name'];
            $aktualnyopis = $aktualnyprodukt['description'];
            $aktualnacena = $aktualnyprodukt['price'];
            $aktualnadostepnosc = $aktualnyprodukt['available'];

            $zapytanie2 = "UPDATE products SET";

            $licznik = 0;

            if (!empty($_POST['nazwa'])){
                $aktualnanazwa = $_POST['nazwa'];
                $zapytanie2 = $zapytanie2." name = '".$aktualnanazwa."'";
                $licznik++;
            }

            if (!empty($_POST['opis'])){
                $aktualnyopis = $_POST['opis'];
                if ($licznik > 0) {
                    $zapytanie2 = $zapytanie2.",";
                }
                $zapytanie2 = $zapytanie2." description = '".$aktualnyopis."'";
                $licznik++;
            }
        
            if (!empty($_POST['cena'])){
                $aktualnacena = $_POST['cena'];
                if ($licznik > 0) {
                    $zapytanie2 = $zapytanie2.",";
                }
                $zapytanie2 = $zapytanie2." price = '".$aktualnacena."'";
                $licznik++;
            }
        
            if (!empty($_POST['dostepnosc'])){
                $aktualnadostepnosc = $_POST['dostepnosc'];
                if ($licznik > 0) {
                    $zapytanie2 = $zapytanie2.",";
                }
                $zapytanie2 = $zapytanie2." available = '".$aktualnadostepnosc."'";
            }
        
            $zapytanie2 = $zapytanie2.' WHERE name LIKE "'.$produkt.'"';
            
            mysqli_query($db, $zapytanie2);
        
            addToHistory("EditProduct", $aktualnanazwa);
            header("location: ../index.php?error=Produkt edytowany pomyślnie");
            }   
    } else {
        header("location: ../index.php?error=Nie ma takiego produktu w bazie");
    }

    mysqli_close($db);
?>