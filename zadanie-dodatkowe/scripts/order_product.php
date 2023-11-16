<?php
    $db = mysqli_connect("localhost","root","","erpdatabase");

    session_start();

    if (isset($_SESSION['username']) && isset($_POST['productID']) && isset($_POST['qty'])){
        $currentTime = gmdate('Y-m-d h:i:s', time());
        $customer = $_SESSION['username'];
        $productID = $_POST['productID'];
        $qty = $_POST['qty'];

        $sql = "INSERT INTO orders VALUES ('', '".$currentTime."','".$customer."','".$productID."','".$qty."');";
        $sql2 = "UPDATE products SET available = available - ".$qty." WHERE id = ".$productID;

        $r = mysqli_query($db, $sql);
        if ($r){
            $q = mysqli_query($db, $sql2);
            header("location: ../index.php?error=Zamówienie złożone pomyślnie");
        } else{
            header("location: ../index.php?error=Wystąpił błąd przy składaniu zamówienia");
        } 
    } else{
        header("location: ../index.php?error=Wystąpił błąd przy składaniu zamówienia");
    }

    mysqli_close($db);
?>