<section id="edit_customer">
    <form action="./scripts/edit_customer.php" method="POST"> 
        <h2>Edytuj klienta</h2>
        <input list="lista_klientow" name="klient" required> <br>
        <label for="imie">Imię: </label> <br>
        <input type="text" name="imie"> <br>
        <label for="nazwisko">Nazwisko: </label> <br>
        <input type="text" name="nazwisko"> <br>
        <label for="adres">Adres: </label> <br>
        <input type="text" name="adres"> <br>
        <label for="email">Email: </label> <br>
        <input type="email" name="email"> <br>
        <input type="submit" value="Edytuj">
    </form>
</section>