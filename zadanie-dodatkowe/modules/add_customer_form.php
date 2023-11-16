<section id="add_customer_form">
    <h2>Dodaj klienta</h2>
    <form action="./scripts/add_customer.php" method="POST">
        <label for="firstname">Imię: </label> <br>
        <input type="text" name="firstname" required> <br>
        <label for="lastname">Nazwisko: </label> <br>
        <input type="text" name="lastname" required> <br>
        <label for="address">Adres: </label> <br>
        <input type="text" name="address" required> <br>
        <label for="email">Email: </label> <br>
        <input type="email" name="email" required> <br>
        <input type="submit" value="Wyślij">
    </form>
</section>