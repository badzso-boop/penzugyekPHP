<?php
    include_once 'header.php';
?>

<section>
    <h2>Kiadás hozzáadása</h2>
    <div class="form">
        <form action="includes/issuance_add.inc.php" method="post">
            <input type="text" placeholder="Megnevezés" name="kname">
            <input type="number" placeholder="Ár" name="kquantity">
            <label for="Ktype">Típus:</label>
            <select id="Ktype" name="ktype">
                <option value="bevasarlas">Bevásárlás</option>
                <option value="csekkek">Csekkek</option>
                <option value="telefonszamla">Telefonszámla</option>
                <option value="tankolas">Tankolás</option>
                <option value="szorakozas">Szórakozás</option>
                <option value="zsebpenz">Zsebpénz</option>
                <option value="egyeb">Egyéb</option>
            </select>
            <input type="date" name="kdate">
            <button type="submit" name = "submit">Mentés</button>
        </form>
    </div>
    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Töltsd ki az összes mezőt!</p>";
            }
            else if($_GET["error"] == "wrongkname") {
                echo "<p>Hibás megnevezés!</p>";
            }
            else if($_GET["error"] == "wrongkquantity") {
                echo "<p>Hibás mennyiség!</p>";
            }
            else if($_GET["error"] == "wrongktype") {
                echo "<p>Hibás típus!</p>";
            }
            else if($_GET["error"] == "wrongkdate") {
                echo "<p>Hibás dátum!</p>";
            }
        }
    ?>
</section>


<?php
    include_once 'footer.php';
?>
