<?php 
    $db = mysqli_connect("localhost","root","","erpdatabase");
    require("./validate.php");
    require("./addToHistory.php");

    if (isset($_POST['lista_produktow'])){
        $produkt = $_POST['lista_produktow'];

        $zapytanie = 'DELETE FROM products WHERE name LIKE "'.$produkt.'"';

        if (isNotBlank($produkt)){
            $r = mysqli_query($db, $zapytanie);
            if($r){
                addToHistory("DeleteProduct", $produkt);
                header("location: ../index.php?error=Produkt został usunięty");
            } else{
                header("location: ../index.php?error=Wystąpił błąd podczas usuwania produktu");
            }
        } else{
            header("location: ../index.php?error=Nie ma takiego produktu w bazie");
        }
    }
    mysqli_close($db);
?>