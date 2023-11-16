<?php 
    $db = mysqli_connect("localhost","root","","erpdatabase");
    require("./validate.php");
    require("./addToHistory.php");

    if (isset($_POST['lista_klientow'])){
            $klient = explode(' ', $_POST['lista_klientow']);

            $zapytanie = 'DELETE FROM customers WHERE firstname LIKE "'.$klient[0].'" and lastname LIKE "'.$klient[1].'"';

        
            $r = mysqli_query($db, $zapytanie);
            if($r){
                addToHistory("DeleteCustomer", $klient[0]." ".$klient[1]);
                header("location: ../index.php?error=Klient został usunięty");
            } else{
                header("location: ../index.php?error=Wystąpił błąd podczas usuwania klienta");
            }
    }
    mysqli_close($db);
?>