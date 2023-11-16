<section id="edit_product">
    <form action="./scripts/edit_product.php" method="POST"> 
        <h2>Edytuj produkt</h2>
        <input list="lista_produktow" name="produkt" required> <br>
        <label for="nazwa">Nazwa: </label> <br>
        <input type="text" name="nazwa"> <br>
        <label for="opis">Opis: </label> <br>
        <input type="text" name="opis"> <br>
        <label for="cena">Cena: </label> <br>
        <input type="number" step="0.01" min="0" name="cena"> <br>
        <label for="dostepnosc">Dostępność: </label> <br>
        <input type="number" step="1" min="1" name="dostepnosc"> <br>
        <input type="submit" value="Edytuj">
    </form>
</section>