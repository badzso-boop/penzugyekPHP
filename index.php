<?php
    include_once 'header.php';
?>

<h2>Bevételek</h2>
<button type="submit" id="bszerkesztes" onclick="bszerkesztes()">Szerkesztés</button>
<input type="number" id="belista" class="hide">
<button id="belista" class="hide" onclick="bevetelSzerk()">Eztet akarom</button>
<button id="belista" class="hide" onclick="bementes()">Mentés</button>
<table>
    <tr>
        <td id="belista" class="hide">ID</td>
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
                echo "<tr><td id='belista' class='hide' style='border: 1px solid; width: 150px'>".$row["id"]."</td><td id='input".$row["id"]."' class='hide'><input id='adat".$row["id"]."' type='text' placeholder='tipus'></td><td id='tipus".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["tipus"]."</td><td id='input".$row["id"]."' class='hide'><input id='adat".$row["id"]."' type='text' placeholder='megnevezes'><td id='megnevezes".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td><td id='input".$row["id"]."' class='hide'><input id='adat".$row["id"]."' type='text' placeholder='ar'><td id='ar".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["mennyiseg"]."Ft</td><td id='input".$row["id"]."' class='hide'><input id='adat".$row["id"]."' type='text' placeholder='datum'><td id='datum".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["datum"]."</td></tr>";
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
        <td id="kilista" class="hide">ID</td>
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
                echo "<tr><td id='kilista' class='hide' style='border: 1px solid; width: 150px'>".$row["id"]."</td><td style='border: 1px solid; width: 150px'>".$row["tipus"]."</td><td style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td><td style='border: 1px solid; width: 150px'>".$row["mennyiseg"]."Ft</td><td style='border: 1px solid; width: 150px'>".$row["datum"]."</td> <td id='kilista' class='hide'><button>Nyomj meg</button></td></tr>";
            }
        } else {
            echo "<li>Nincsen eredmény!</li>";
        }
    ?>
</table>

<?php
    include_once 'footer.php';
?>
