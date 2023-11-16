<section id="add_employee_form">
    <h2>Dodaj pracownika</h2>
    <form action="./scripts/add_employee.php" method="POST">
        <label for="firstname">Imię: </label> <br>
        <input type="text" name="firstname" required> <br>
        <label for="lastname">Nazwisko: </label> <br>
        <input type="text" name="lastname" required> <br>
        <label for="position">Stanowisko: </label> <br>
        <input list="stanowiska" name="position" required> <br>
        <label for="salary">Pensja: </label> <br>
        <input type="number" name="salary" min="1" required> <br>
        <input type="submit" value="Wyślij">

        <datalist id="stanowiska">
            <option value="CEO">
            <option value="Wiceszef">
            <option value="Menadżer Działu">
            <option value="Doświadczony pracownik">
            <option value="Niedoświadczony pracownik">
        </datalist>
    </form>
</section>