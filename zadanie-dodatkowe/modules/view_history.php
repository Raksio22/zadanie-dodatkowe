<?php
    echo ("<h2>Akcje pracowników<h2>");

    $db = mysqli_connect("localhost","root","","erpdatabase");

    $sql = "SELECT * FROM employeeactions";

    $wynik = mysqli_query($db, $sql);

    echo "<table> <tr> <th>ID</th> <th>Pracownik</th> <th>Typ akcji</th> <th>Zmiana</th> <th>Data</th> </tr>";

    while ($result = mysqli_fetch_assoc($wynik)){
        echo "<tr>";
        echo "<td>".$result['ID']."</td>";
        echo "<td>".$result['employee']."</td>";
        echo "<td>".$result['actiontype']."</td>";
        echo "<td>".$result['target']."</td>";
        echo "<td>".$result['date']."</td>";
        echo "</tr>";
    }
    
    echo "</table>";

    mysqli_close($db);
?>