<?php
    include_once 'header.php';
?>

<h2>Bevételek</h2>
<table>
    <tr>
        <td>Típus</td>
        <td>Megnevezés</td>
        <td>Ár</td>
        <td>Dátum</td>
    </tr>
    <?php 
        require_once 'includes/dbh.inc.php';

        $sql = "SELECT id,tipus, megnevezes, mennyiseg, datum FROM bevetelek";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td id='id' class='hide' style='border: 1px solid; width: 150px'>".$row["id"]."</td><td style='border: 1px solid; width: 150px'>".$row["tipus"]."</td><td style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td><td style='border: 1px solid; width: 150px'>".$row["mennyiseg"]."Ft</td><td style='border: 1px solid; width: 150px'>".$row["datum"]."</td></tr>";
            }
        } else {
            echo "<li>Nincsen eredmény!</li>";
        }
    ?>
</table>

<h2>Kiadás</h2>
<button type="submit" id="kszerkesztes" onclick="kszerkesztes()">Szerkesztés</button>
<table>
    <tr>
        <td>Típus</td>
        <td>Megnevezés</td>
        <td>Ár</td>
        <td>Dátum</td>
    </tr>
    <?php 
        require_once 'includes/dbh.inc.php';

        $sql = "SELECT id, tipus, megnevezes, mennyiseg, datum FROM kiadas";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td id='id' class='hide' style='border: 1px solid; width: 150px'>".$row["id"]."</td><td style='border: 1px solid; width: 150px'>".$row["tipus"]."</td><td style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td><td style='border: 1px solid; width: 150px'>".$row["mennyiseg"]."Ft</td><td style='border: 1px solid; width: 150px'>".$row["datum"]."</td></tr>";
            }
        } else {
            echo "<li>Nincsen eredmény!</li>";
        }
    ?>
</table>

<?php
    include_once 'footer.php';
?>
