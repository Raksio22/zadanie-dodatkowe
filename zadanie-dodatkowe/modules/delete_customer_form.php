<section id="delete_customers_form">
    <form action="./scripts/delete_customer.php" method="POST">
        <h2>Usuń klienta</h2>
        <input list="lista_klientow" name="lista_klientow" required>
        <datalist id="lista_klientow">
        <?php 
            $db = mysqli_connect("localhost","root","","erpdatabase");

            $klienci = "SELECT firstname, lastname FROM customers";
            $wynik = mysqli_query($db, $klienci);
            while ($result = mysqli_fetch_assoc($wynik)){
                echo "<option value='".$result['firstname']." ".$result['lastname']."'>";
            }
            mysqli_close($db);
        ?>
        </datalist>
        <input type="submit" value="Usuń">
    </form>
</section>