<?php
    $db = mysqli_connect("localhost","root","","erpdatabase");
    require("./validate.php");
    require("./addToHistory.php");

    if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['available'])){

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = validate($_POST['price']);
    $available = validate($_POST['available']);

        if (isNotBlank($name) && isNotBlank($description) && isNotBlank($price) && isNotBlank($available)){
            $zapytanie = 'INSERT INTO products VALUES ("","'.$name.'","'.$description.'","'.$price.'","'.$available.'");';

            if ($price > 0 || $available > 0){
                $result = mysqli_query($db, $zapytanie);
                if($result){
                    addToHistory("AddProduct", $name);
                    header("location: ../index.php?error=Produkt dodany pomyślnie");
                } else {
                    header("location: ../index.php?error=Nie udało się dodać produktu");
                }
            } else {
                header("location: ../index.php?error=Cena lub ilość produktu musi być większa niż 0");
            }
        } else{
            header("location: ../index.php?error=Informacje o produkcie nie mogą być puste");
        }
    } else {
        header("location: ../index.php?error=Brakuje danych o produkcie");
    }
    
    mysqli_close($db);
?>