<section id="delete_products_form">
    <form action="./scripts/delete_product.php" method="POST">
        <h2>Usuń produkt</h2>
        <input list="lista_produktow" name="lista_produktow" required>
        <datalist id="lista_produktow">
        <?php 
            $db = mysqli_connect("localhost","root","","erpdatabase");

            $Produkty = "SELECT name FROM products";
            $wynik = mysqli_query($db, $Produkty);
            while ($result = mysqli_fetch_assoc($wynik)){
                echo "<option value='".$result['name']."'>";
            }          

            mysqli_close($db);
        ?>
        </datalist>
        <input type="submit" value="Usuń">
    </form>
</section>
