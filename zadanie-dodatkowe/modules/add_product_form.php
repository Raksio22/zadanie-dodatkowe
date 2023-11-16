<section id="add_product_form">
    <h2>Dodaj produkt</h2>
    <form action="./scripts/add_product.php" method="POST">
        <label for="name">Nazwa: </label> <br>
        <input type="text" name="name" required> <br>
        <label for="description">Opis: </label> <br>
        <input type="text" name="description" required> <br>
        <label for="price">Cena: </label> <br>
        <input type="number" step="0.01" name="price" min="0" required> <br>
        <label for="available">Dostępna ilość: </label> <br>
        <input type="number" name="available" min="1" required> <br>
        <input type="submit" value="Wyślij">
    </form>
</section>