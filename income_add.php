<?php
    include_once 'header.php';
?>

<section class="m-auto mt-5 container">
    <h2>Bevétel hozzáadása</h2>
    <div class="form mb-4">
        <form action="includes/income_add.inc.php" method="post">
            <div class="input-group mb-3 mt-3 w-75">
                <span class="input-group-text" id="inputGroup-sizing-default">Megnevezés</span>
                <input type="text" class="form-control" name="bname">
            </div>
            <div class="input-group mb-3 mt-3 w-75">
                <input type="number" class="form-control" placeholder="Ár" name="bquantity">
                <span class="input-group-text">HUF</span>
            </div>
            <div class="input-group mb-3 mt-3 w-75">
                <label class="input-group-text" for="btype">Típus:</label>
                <select id="btype" name="btype" class="form-select">
                    <option value="wolt">Wolt</option>
                    <option value="program">Programozás</option>
                    <option value="wordpress">Wordpress</option>
                    <option value="zsebpenz">Zsebpénz</option>
                    <option value="egyeb">Egyéb</option>
                </select>
            </div>
            <div class="input-group mb-3 mt-3 w-75">
                <input class="form-control" type="date" name="bdate" placeholder="dátum">
            </div>
            <button type="submit" name="submit" class="btn btn-secondary">Mentés</button>
        </form>
    </div>
    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Töltsd ki az összes mezőt!</p></div>";
            }
            else if($_GET["error"] == "wrongbname") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Hibás megnevezés!</p></div>";
            }
            else if($_GET["error"] == "wrongbquantity") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Hibás mennyiség!</p></div>";
            }
            else if($_GET["error"] == "wrongbtype") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Hibás típus!</p></div>";
            }
            else if($_GET["error"] == "wrongbdate") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Hibás dátum!</p></div>";
            }
            else if($_GET["error"] == "login") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Lépj be!</p></div>";
            }
        }
    ?>
</section>


<?php
    include_once 'footer.php';
?>
