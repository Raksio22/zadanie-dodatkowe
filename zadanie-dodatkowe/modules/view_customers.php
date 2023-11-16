<?php
    $db = mysqli_connect("localhost","root","","erpdatabase");

    echo ("<section id='view_customers'>");
    echo ("<h2>Przeglądaj klientów</h2>");

    $zapytanie = 'SELECT * FROM customers';
    $result = mysqli_query($db, $zapytanie);
    
    while ($wynik = mysqli_fetch_assoc($result)){
        echo '<div class="product">';
            echo '<h3>'.$wynik['firstname'].' '.$wynik['lastname'].'</h3>';
            echo '<p>Adres: '.$wynik['address'].'</p>';
            echo '<p>Email: '.$wynik['email'].'</p>';
        echo '</div>';
    }

    echo ("</section>");

    mysqli_close($db);
?>