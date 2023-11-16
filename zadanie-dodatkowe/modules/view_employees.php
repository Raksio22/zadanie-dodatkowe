<?php
    $db = mysqli_connect("localhost","root","","erpdatabase");

    echo ("<section id='view_employees'>");
    echo ("<h2>Przeglądaj pracowników</h2>");

    $zapytanie = 'SELECT * FROM employees';
    $result = mysqli_query($db, $zapytanie);
    
    while ($wynik = mysqli_fetch_assoc($result)){
        echo '<div class="product">';
            echo '<h3>'.$wynik['FirstName'].' '.$wynik['LastName'].'</h3>';
            echo '<p>Stanowisko: <b>'.$wynik['Position'].'</b></p>';
            echo '<p>Pensja: '.$wynik['Salary'].'zł</p>';
        echo '</div>';
    }

    echo ("</section>");

    mysqli_close($db);
?>