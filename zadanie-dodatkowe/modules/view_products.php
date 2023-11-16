<?php
    $db = mysqli_connect("localhost","root","","erpdatabase");

    echo ("<section id='view_products'>");
    echo ("<h2>Przeglądaj produkty</h2>");

    $zapytanie = 'SELECT * FROM products';
    $result = mysqli_query($db, $zapytanie);
    
    while ($wynik = mysqli_fetch_assoc($result)){
        echo '<div class="product">';
            echo '<h3>'.$wynik['name'].'</h3>';
            echo '<p>'.$wynik['description'].'</p>';
            echo '<p>Cena: '.$wynik['price'].' zł</p>';
            echo '<p> Dostępność: '.$wynik['available'].' szt.</p>';
            if(isset($_SESSION['username'])){
                if ($wynik['available'] > 0){
                echo '<form action="./scripts/order_product.php" method="POST">
                    <input type="hidden" name="productID" value="'.$wynik['id'].'">
                    <label for="qty">Ilość: </label>
                    <input type="number" name="qty" min="1" max="'.$wynik['available'].'" step="1" placeholder="1" required>
                    <input type="submit" value="Kup teraz">
                  </form>';
                } else {
                    echo '<b>Produkt aktualnie niedostępny</b>';
                }
            }
        echo '</div>';
    }

    echo ("</section>");

    mysqli_close($db);
?>