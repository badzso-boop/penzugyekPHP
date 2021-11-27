<?php
  include_once 'header.php';
?>
<div class="container mt-5">
  <section class="signup-form">
    <div class="border p-5">
      <h2>Regisztráció</h2>
      <div class="signup-form-form">
        <form action="includes/signup.inc.php" method="post">
          <div class="mb-3">
            <label for="name" class="form-label">Teljes Név</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email cím</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Az adatait biztonságban tartjuk.</div>
          </div>
          <div class="mb-3">
            <label for="uid" class="form-label">Felhasználónév</label>
            <input type="text" name="uid" class="form-control">
          </div>
          <div class="mb-3">
            <label for="pwd" class="form-label">Jelszó</label>
            <input type="password" class="form-control" name="pwd" id="password1">
          </div>
          <div class="mb-3">
            <label for="pwd" class="form-label">Jelszó ismét</label>
            <input type="password" class="form-control" name="pwdrepeat" id="password1">
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Regisztráció</button>
        </form>
      </div>
    
    <?php
      // Error messages
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
          echo "<div class='mt-4 m-auto alert alert-danger w-75 text-center'><p class='h2 m-auto'>Töltsd ki az összes mezőt!</p></div>";
        }
        else if ($_GET["error"] == "invaliduid") {
          echo "<div class='mt-4 m-auto alert alert-danger w-75 text-center'><p class='h2 m-auto'>Válassz egy másik felhasználónevet!</p></div>";
        }
        else if ($_GET["error"] == "invalidemail") {
          echo "<div class='mt-4 m-auto alert alert-danger w-75 text-center'><p class='h2 m-auto'>Válassz egy másik email címet!</p></div>";
        }
        else if ($_GET["error"] == "passwordsdontmatch") {
          echo "<div class='mt-4 m-auto alert alert-danger w-75 text-center'><p class='h2 m-auto'>Jelszavak nem egyeznek!</p></div>";
        }
        else if ($_GET["error"] == "stmtfailed") {
          echo "<div class='mt-4 m-auto alert alert-danger w-75 text-center'><p class='h2 m-auto'>Valami hiba történt!</p></div>";
        }
        else if ($_GET["error"] == "usernametaken") {
          echo "<div class='mt-4 m-auto alert alert-danger w-75 text-center'><p class='h2 m-auto'>Felhasználónév foglalt!</p></div>";
        }
        else if ($_GET["error"] == "none") {
          echo "<div class='mt-4 m-auto alert alert-danger w-75 text-center'><p class='h2 m-auto'>Sikeres bejelentkezés!</p></div>";
        }
      }
    ?>
    </div>
  </section>
</div>
<?php
  include_once 'footer.php';
?>
