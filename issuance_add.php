<?php
    include_once 'header.php';
?>

<section class="m-auto mt-5 container">
    <h2>Kiadás hozzáadása</h2>
    <div class="form mb-4">
        <form action="includes/issuance_add.inc.php" method="post">
            <div class="input-group mb-3 mt-3 w-75">
                <span class="input-group-text" id="inputGroup-sizing-default">Megnevezés</span>
                <input type="text" class="form-control" name="kname">
            </div>
            <div class="input-group mb-3 mt-3 w-75">
                <input type="number" class="form-control" placeholder="Ár" name="kquantity">
                <span class="input-group-text">HUF</span>
            </div>
            <div class="input-group mb-3 mt-3 w-75">
                <label class="input-group-text" for="Ktype">Típus:</label>
                <select id="Ktype" name="ktype" class="form-select">
                    <option value="bevasarlas">Bevásárlás</option>
                    <option value="csekkek">Csekkek</option>
                    <option value="telefonszamla">Telefonszámla</option>
                    <option value="tankolas">Tankolás</option>
                    <option value="szorakozas">Szórakozás</option>
                    <option value="zsebpenz">Zsebpénz</option>
                    <option value="egyeb">Egyéb</option>
                </select>
            </div>
            <div class="input-group mb-3 mt-3 w-75">
                <input class="form-control" type="date" name="kdate">
            </div>
            <button type="submit" name="submit" class="btn btn-secondary">Mentés</button>
        </form>
    </div>
    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Töltsd ki az összes mezőt!</p></div>";
            }
            else if($_GET["error"] == "wrongkname") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Hibás megnevezés!</p></div>";
            }
            else if($_GET["error"] == "wrongkquantity") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Hibás mennyiség!</p></div>";
            }
            else if($_GET["error"] == "wrongktype") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Hibás típus!</p></div>";
            }
            else if($_GET["error"] == "wrongkdate") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Hibás dátum!</p></div>";
            } else if($_GET["error"] == "login") {
                echo "<div class='alert alert-danger w-75 text-center'><p class='h2 m-auto'>Lépj be!</p></div>";
            }
        }
    ?>
</section>


<?php
    include_once 'footer.php';
?>
