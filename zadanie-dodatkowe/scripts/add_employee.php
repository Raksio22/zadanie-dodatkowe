<?php
    $db = mysqli_connect("localhost","root","","erpdatabase");
    require("./validate.php");
    require("./addToHistory.php");

    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['position']) && !empty($_POST['salary'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        if (isNotBlank($firstname) && isNotBlank($lastname) && isNotBlank($position) && isNotBlank($salary)){
            $zapytanie = 'INSERT INTO employees VALUES ("","'.$firstname.'","'.$lastname.'","'.$position.'","'.$salary.'");';
            $result = mysqli_query($db,$zapytanie);

            if ($result){
                addToHistory("AddEmployee", $firstname." ".$lastname);
                header("location: ../index.php?error=Pracownik dodany pomyślnie");
            } else {
                header("location: ../index.php?error=Nie udało się dodać pracownika");
            }
        } else{
            header("location: ../index.php?error=Informacje o pracowniku nie mogą być puste");
        }
    } else{
        header("location: ../index.php?error=Brakuje informacji o pracowniku");
    }

    mysqli_close($db);
?>