<?php
    include_once 'header.php';
?>

<h1 class="mt-3 text-center">Bevételek</h1>
<div class="container">
    <div class="row">
        <div class="col-8 col-md-3">
            <button class="gomb" type="submit" id="bszerkesztes" onclick="bszerkesztes()">Admin</button>
            <input type="number" id="belista" class="hide">
            <button class="hide gomb" id="belista" onclick="bevetelSzerk()">Szerkesztés</button>
            <button class="hide gomb" id="belista" onclick="bdelete()">Törlés</button>
        </div>
        <div class="col-sm-15 col-md-9">
            <table class="mt-3 mb-3">
            <tr class="text-center">
                <td style="width:150px; border-bottom: 2px solid black;" id="belista" class="hide">ID</td>
                <td style="width:150px; border-bottom: 2px solid black;" >Típus</td>
                <td style="width:150px; border-bottom: 2px solid black;" >Megnevezés</td>
                <td style="width:150px; border-bottom: 2px solid black;" >Ár</td>
                <td style="width:150px; border-bottom: 2px solid black;" >Dátum</td>
            </tr>
            <?php 
                require_once 'includes/dbh.inc.php';

                $uid = $_SESSION["userid"];

                $sql = "SELECT * FROM bevetelek WHERE uid='$uid'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if(isset($_SESSION["userid"]) == $row["uid"])
                        {
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
                                <td id='megnevezes".$row["id"]."' class='text-center' style='border: 1px solid; width: 150px'>".$row["megnevezes"]."</td>
                                <td id='input".$row["id"]."' class='hide'>
                                    <input id='adat".$row["id"]."' type='number' placeholder='ar' name='bar'>
                                </td>
                                <td id='ar".$row["id"]."' style='border: 1px solid; width: 150px'>".number_format($row["mennyiseg"], 2, ',', ' ')."Ft</td>
                                <td id='input".$row["id"]."' class='hide'>
                                    <input id='adat".$row["id"]."' type='date' name='bdatum'>
                                </td>
                                <td id='datum".$row["id"]."' style='border: 1px solid; width: 150px'>".$row["datum"]."</td>
                                <td class='hide'>
                                    <input id='id".$row["id"]."' type='number' placeholder='id' name='bid'>
                                </td>
                                <td><button id='input".$row["id"]."' class='hide'>Mentés</button></td>
                            </tr></form>";
                        } else {
                            echo "";
                        }
                    }
                } else {
                    echo "<li>Nincsen eredmény!</li>";
                }

                $uid = $_SESSION["userid"];
                $sql2 = "SELECT mennyiseg FROM bevetelek WHERE uid='$uid'";
                $result = $conn->query($sql2);
                $ossz = 0;

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $ossz += $row["mennyiseg"];
                    }
                }
                $ossz = number_format($ossz, 2, ',', ' ');
                echo "<tr>
                        <td style='border: 1px solid; width: 600px' colspan = '4'>Összes bevétel: ".$ossz."Ft</td>
                        </tr>";
            ?>
            </table>
        </div>
    </div>
</div>

<div class="mt-5">
        <hr class="py-1">
        <h2 class="mt-3 text-center">Bevétel szűrés</h2>
        <hr class="py-1">
        <div class="container">
            <div class="row">
                <div class="col-8 col-md-3">
                    <form action="index.php" method="post">
                        <input type="number" placeholder="év" name="sev" class="m-2">
                        <br>
                        <input type="number" placeholder="hónap" name="shonap" class="m-2">
                        <br>
                        <input type="text" placeholder="Megnevezes" name="smegnevezes" class="m-2">
                        <br>
                        <select name='stipus' class="m-2 form-select w-75">
                            <option value=''>Kérem válasszon!</option>
                            <option value='wolt'>Wolt</option>
                            <option value='program'>Programozás</option>
                            <option value='wordpress'>Wordpress</option>
                            <option value='zsebpenz'>Zsebpénz</option>
                            <option value='egyeb'>Egyéb</option>
                        </select>
                        <div class="m-2">
                            <button type="submit" class="gombk" name="ssubmit">Választ</button>
                            <button type="submit" class="gombk" name="sdelete">Törlés</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-15 col-md-9">
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
            </div>
        </div>
</div>

<div class="mt-5">
    <hr class="py-1 info">
    <h2 class="mt-5 text-center">Kiadások</h2>
    <div class="container">
        <div class="row">
            <div class="col-8 col-md-3">
                <button class="gomb" type="submit" id="kszerkesztes" onclick="kszerkesztes()">Admin</button>
                <input type="number" id="kilista" class="hide">
                <button class="gomb hide" id="kilista" onclick="kiadasSzerk()">Szerkesztés</button>
                <button class="gomb hide" id="kilista" onclick="kidelete()">Törlés</button>
            </div>
            <div class="col-sm-15 col-md-9">
                <table class="mt-3 mb-3">
                    <tr class='text-center'>
                        <td style="width:150px; border-bottom: 2px solid black;" id='kilista' class='hide'>ID</td>
                        <td style="width:150px; border-bottom: 2px solid black;">Típus</td>
                        <td style="width:150px; border-bottom: 2px solid black;">Megnevezés</td>
                        <td style="width:150px; border-bottom: 2px solid black;">Ár</td>
                        <td style="width:150px; border-bottom: 2px solid black;">Dátum</td>
                    </tr>
                    <?php 
                        require_once 'includes/dbh.inc.php';

                        $uid = $_SESSION["userid"];

                        $sql = "SELECT * FROM kiadas WHERE uid='$uid'";
                        $result = $conn->query($sql);

                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                if(isset($_SESSION["userid"]) == $row["uid"])
                                {
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
                                }else {
                                    echo "";
                                }
                            }
                        } else {
                            echo "<li>Nincsen eredmény!</li>";
                        }

                        $uid = $_SESSION["userid"];
                        $sql2 = "SELECT mennyiseg FROM kiadas WHERE uid='$uid'";
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
            </div>
        </div>
    </div>
    
    
</div>

<div class="mt-5 mb-5">
    <hr class="py-1">
        <h2 class="mt-3 text-center">Kiadások szűrése</h2>
    <hr class="py-1">
    <div class="container">
        <div class="row">
            <div class="col-8 col-md-3">
                <form action="index.php" method="post">
                    <input type="number" placeholder="év" name="kev" class="m-2">
                    <br>
                    <input type="number" placeholder="hónap" name="khonap" class="m-2">
                    <br>
                    <input type="text" placeholder="Megnevezes" name="kmegnevezes" class="m-2">
                    <br>
                    <select name='ktipus'  class="m-2 form-select w-75">
                        <option value=''>Kérem válasszon!</option>
                        <option value="bevasarlas">Bevásárlás</option>
                        <option value="csekkek">Csekkek</option>
                        <option value="telefonszamla">Telefonszámla</option>
                        <option value="tankolas">Tankolás</option>
                        <option value="szorakozas">Szórakozás</option>
                        <option value="zsebpenz">Zsebpénz</option>
                        <option value="egyeb">Egyéb</option>
                    </select>
                    <div class="m-2">
                        <button type="submit" name="ksubmit" class="gombk">Választ</button>
                        <button type="submit" name="kdelete" class="gombk">Törlés</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-15 col-md-9">
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

                        $uid = $_SESSION["userid"];
                        $sql55 = "SELECT * FROM kiadas WHERE datum LIKE '$datum%' or tipus='$tipus' or megnevezes='$megnevezes' and uid='$uid'";

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
        </div>
    </div>
</div>

<?php
    include_once 'footer.php';
?>
