<?php
  include_once 'header.php';
?>
<div class="container mt-5">
  <section class="signup-form">
    <div class="border p-5">
      <h2>Belépés</h2>
      <div class="signup-form-form">
        <form action="includes/login.inc.php" method="post">
          <div class="mb-3">
            <label for="name" class="form-label">Felhasználónév/Email</label>
            <input type="text" name="uid" class="form-control">
          </div>
          <div class="mb-3">
            <label for="pwd" class="form-label">Jelszó</label>
            <input type="password" class="form-control" name="pwd" id="password1">
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Belépés</button>
        </form>
      </div>
      <?php
        // Error messages
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<div class='mt-4 m-auto alert alert-danger w-75 text-center'><p class='h2 m-auto'>Töltsd ki az összes mezőt!</p></div>";
          }
          else if ($_GET["error"] == "wronglogin") {
            echo "<div class='mt-4 m-auto alert alert-danger w-75 text-center'><p class='h2 m-auto'>Hibás belépés!</p></div>";
          }
        }
      ?>
    </div>
  </section>
</div>

<?php
  include_once 'footer.php';
?>
