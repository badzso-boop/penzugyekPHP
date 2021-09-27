<?php
    include_once 'header.php';
?>

<section class="bevetel">
    <h2>Bevétel hozzáadása</h2>
    <div class="form">
        <form action="includes/income_add.inc.php" method="post">
            <input type="text" placeholder="Megnevezés" name="bname">
            <input type="number" placeholder="Mennyiség" name="bquantity">
            <label for="Btype">Típus:</label>
            <select id="Btype" name="btype">
                <option value="wolt">Wolt</option>
                <option value="program">Programozás</option>
                <option value="wordpress">Wordpress</option>
                <option value="zsebpenz">Zsebpénz</option>
                <option value="egyeb">Egyéb</option>
            </select>
            <input type="date" name="bdate">
            <button type="submit" name = "submit">Mentés</button>
        </form>
    </div>
    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Töltsd ki az összes mezőt!</p>";
            }
            else if($_GET["error"] == "wrongbname") {
                echo "<p>Hibás megnevezés!</p>";
            }
            else if($_GET["error"] == "wrongbquantity") {
                echo "<p>Hibás mennyiség!</p>";
            }
            else if($_GET["error"] == "wrongbtype") {
                echo "<p>Hibás típus!</p>";
            }
            else if($_GET["error"] == "wrongbdate") {
                echo "<p>Hibás dátum!</p>";
            }
        }
    ?>
</section>


<?php
    include_once 'footer.php';
?>
