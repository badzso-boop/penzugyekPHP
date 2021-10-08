<?php
    include_once 'header.php';
?>

<h2>Bevételek</h2>
<button type="submit" id="bszerkesztes" onclick="bszerkesztes()">Szerkesztés</button>
<input type="number" id="belista" class="hide">
<button id="belista" class="hide" onclick="bevetelSzerk()">Eztet akarom</button>
<button id="belista" class="hide" onclick="bdelete()">Törlés</button>
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
                echo "<form action='includes/bedit.inc.php' method='post'><tr>
                        <td id='belista' class='hide' style='border: 1px solid; width: 150px'>".$row["id"]."</td>
                        <td id='input".$row["id"]."' class='hide'>
                            <select id='adat".$row["id"]."' name='btipus'>
                                <option value='wolt'>Wolt</option>
                                <option value='program'>Programozás</option>
                                <option value='wordpress'>Wordpress</option>
                                <option value='zsebpenz'>Zsebpénz</option>
                                <option value='egyeb'>Egyéb</option>
                            </select>
                        </td>
                        <td id='tipus".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["tipus"]."</td>
                        <td id='input".$row["id"]."' class='hide'>
                            <input id='adat".$row["id"]."' type='text' placeholder='megnevezes' name='bmegnevezes'>
                        </td>
                        <td id='megnevezes".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td>
                        <td id='input".$row["id"]."' class='hide'>
                            <input id='adat".$row["id"]."' type='number' placeholder='ar' name='bar'>
                        </td>
                        <td id='ar".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["mennyiseg"]."Ft</td>
                        <td id='input".$row["id"]."' class='hide'>
                            <input id='adat".$row["id"]."' type='date' name='bdatum'>
                        </td>
                        <td id='datum".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["datum"]."</td>
                        <td class='hide'>
                            <input id='id".$row["id"]."' type='number' placeholder='id' name='bid'>
                        </td>
                        <td><button id='input".$row["id"]."' class='hide'>Mentés</button></td>
                    </tr></form>";
            }
        } else {
            echo "<li>Nincsen eredmény!</li>";
        }

        $sql2 = "SELECT mennyiseg FROM bevetelek";
        $result = $conn->query($sql2);
        $ossz = 0;

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $ossz += $row["mennyiseg"];
            }
        }
        $ossz = number_format($ossz, 2, ',', ' ');
        echo "<tr>
                <td style='border: 1px solid; width: 600px' colspan = '4'>Összes kiadás: ".$ossz."Ft</td>
              </tr>";
    ?>
</table>

<div>
        <h2>Részletes bevételek</h2>
        <form action="index.php" method="post">
            <input type="number" placeholder="év" name="sev">
            <input type="number" placeholder="hónap" name="shonap">
            <select name='stipus'>
                <option value=''>Kérem válasszon!</option>
                <option value='wolt'>Wolt</option>
                <option value='program'>Programozás</option>
                <option value='wordpress'>Wordpress</option>
                <option value='zsebpenz'>Zsebpénz</option>
                <option value='egyeb'>Egyéb</option>
            </select>
            <input type="text" placeholder="Megnevezes" name="smegnevezes">
            <button type="submit" name="ssubmit">Választ</button>
            <button type="submit" name="sdelete">Törlés</button>
        </form>
        <table>
            <tr>
                <td style="width:150px; border-bottom: 2px solid black;">Típus</td>
                <td style="width:150px; border-bottom: 2px solid black;">Megnevezés</td>
                <td style="width:150px; border-bottom: 2px solid black;">Ár</td>
                <td style="width:150px; border-bottom: 2px solid black;">Dátum</td>
            </tr>
        <?php
            require_once 'includes/dbh.inc.php';
            require_once "includes/functions.inc.php";

            if(isset($_POST["ssubmit"]))
            {
                $ev = $_POST["sev"];
                $honap = $_POST["shonap"];
                $tipus = $_POST["stipus"];
                $megnevezes = $_POST["smegnevezes"];

                $datum = $ev."-".$honap;
                $ossz = 0;

                $sql45 = "SELECT * FROM bevetelek WHERE datum LIKE '$datum%' or tipus='$tipus' or megnevezes='$megnevezes'";

                $result = $conn->query($sql45);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $ossz += $row["mennyiseg"];
                        echo "<tr>
                                <td style='border: 1px solid; width: 150px'>".$row["tipus"]."</td>
                                <td style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td>
                                <td style='border: 1px solid; width: 150px'>".$row["mennyiseg"]."Ft</td>
                                <td style='border: 1px solid; width: 150px'>".$row["datum"]."</td>
                            </tr>";
                    }
                    $ossz = number_format($ossz, 2, ',', ' ');
                    echo "<tr>
                            <td style='border: 1px solid; width: 600px' colspan = '4'>Összes bevétel: ".$ossz."Ft</td>
                        </tr>";
                }
            }
            if(isset($_POST["sdelete"]))
            {
                $sql45 = "SELECT * FROM bevetelek WHERE datum LIKE '1966-10'";
                $result = $conn->query($sql45);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td style='border: 1px solid; width: 150px'>".$row["tipus"]."</td>
                                <td style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td>
                                <td style='border: 1px solid; width: 150px'>".$row["mennyiseg"]."Ft</td>
                                <td style='border: 1px solid; width: 150px'>".$row["datum"]."</td>
                            </tr>";
                    }
                }
            }
        ?>
        </table>
</div>

<h2>Kiadás</h2>
<button type="submit" id="kszerkesztes" onclick="kszerkesztes()">Szerkesztés</button>
<input type="number" id="kilista" class="hide">
<button id="kilista" class="hide" onclick="kiadasSzerk()">Eztet akarom</button>
<button id="kilista" class="hide" onclick="kidelete()">Törlés</button>
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
                echo "<form action='includes/kedit.inc.php' method='post'><tr>
                        <td id='kilista' class='hide' style='border: 1px solid; width: 150px'>".$row["id"]."</td>
                        <td id='input".$row["id"]."' class='hide'>
                            <select id='adat".$row["id"]."' name='ktipus'>
                                <option value='bevasarlas'>Bevásárlás</option>
                                <option value='csekkek'>Csekkek</option>
                                <option value='telefonszamla'>Telefonszámla</option>
                                <option value='tankolas'>Tankolás</option>
                                <option value='szorakozas'>Szórakozás</option>
                                <option value='zsebpenz'>Zsebpénz</option>
                                <option value='egyeb'>Egyéb</option>
                            </select>
                        </td>
                        <td id='ktipus".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["tipus"]."</td>
                        <td id='input".$row["id"]."' class='hide'>
                            <input id='adat".$row["id"]."' type='text' placeholder='megnevezes' name='kmegnevezes'>
                        </td>
                        <td id='kmegnevezes".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td>
                        <td id='input".$row["id"]."' class='hide'>
                            <input id='adat".$row["id"]."' type='number' placeholder='mennyiseg' name='kar'>
                        </td>
                        <td id='kar".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["mennyiseg"]."Ft</td>
                        <td id='input".$row["id"]."' class='hide'>
                            <input id='adat".$row["id"]."' type='date' name='kdatum'>
                        </td>
                        <td id='kdatum".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["datum"]."</td>
                        <td class='hide'>
                            <input id='id".$row["id"]."' type='number' placeholder='id' name='kid'>
                        </td>
                        <td><button id='input".$row["id"]."' class='hide'>Mentés</button></td>
                    </tr></form>";
            }
        } else {
            echo "<li>Nincsen eredmény!</li>";
        }
    ?>
</table>
<h2>Részletes bevételek</h2>
        <form action="index.php" method="post">
            <input type="number" placeholder="év" name="kev">
            <input type="number" placeholder="hónap" name="khonap">
            <select name='ktipus'>
                <option value=''>Kérem válasszon!</option>
                <option value='wolt'>Wolt</option>
                <option value='program'>Programozás</option>
                <option value='wordpress'>Wordpress</option>
                <option value='zsebpenz'>Zsebpénz</option>
                <option value='egyeb'>Egyéb</option>
            </select>
            <input type="text" placeholder="Megnevezes" name="kmegnevezes">
            <button type="submit" name="ksubmit">Választ</button>
            <button type="submit" name="kdelete">Törlés</button>
        </form>
        <table>
            <tr>
                <td style="width:150px; border-bottom: 2px solid black;">Típus</td>
                <td style="width:150px; border-bottom: 2px solid black;">Megnevezés</td>
                <td style="width:150px; border-bottom: 2px solid black;">Ár</td>
                <td style="width:150px; border-bottom: 2px solid black;">Dátum</td>
            </tr>
        <?php
            require_once 'includes/dbh.inc.php';
            require_once "includes/functions.inc.php";

            if(isset($_POST["ksubmit"]))
            {
                $ev = $_POST["kev"];
                $honap = $_POST["khonap"];
                $tipus = $_POST["ktipus"];
                $megnevezes = $_POST["kmegnevezes"];

                $datum = $ev."-".$honap;
                $ossz = 0;

                $sql55 = "SELECT * FROM kiadas WHERE datum LIKE '$datum%' or tipus='$tipus' or megnevezes='$megnevezes'";

                $result = $conn->query($sql55);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $ossz += $row["mennyiseg"];
                        echo "<tr>
                                <td style='border: 1px solid; width: 150px'>".$row["tipus"]."</td>
                                <td style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td>
                                <td style='border: 1px solid; width: 150px'>".$row["mennyiseg"]."Ft</td>
                                <td style='border: 1px solid; width: 150px'>".$row["datum"]."</td>
                            </tr>";
                    }
                    $ossz = number_format($ossz, 2, ',', ' ');
                    echo "<tr>
                            <td style='border: 1px solid; width: 600px' colspan = '4'>Összes kiadás: ".$ossz."Ft</td>
                        </tr>";
                }
            }
            if(isset($_POST["kdelete"]))
            {
                $sql55 = "SELECT * FROM kiadas WHERE datum LIKE '1966-10'";
                $result = $conn->query($sql55);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td style='border: 1px solid; width: 150px'>".$row["tipus"]."</td>
                                <td style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td>
                                <td style='border: 1px solid; width: 150px'>".$row["mennyiseg"]."Ft</td>
                                <td style='border: 1px solid; width: 150px'>".$row["datum"]."</td>
                            </tr>";
                    }
                }
            }
        ?>
        </table>
</div>

<?php
    include_once 'footer.php';
?>
