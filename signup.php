<?php
  include_once 'header.php';
?>

<section class="signup-form">
  <h2>Sign Up</h2>
  <div class="signup-form-form">
    <form action="includes/signup.inc.php" method="post">
      <input type="text" name="name" placeholder="Full name...">
      <input type="text" name="email" placeholder="Email...">
      <input type="text" name="uid" placeholder="Username...">
      <input type="password" name="pwd" placeholder="Password...">
      <input type="password" name="pwdrepeat" placeholder="Repeat password...">
      <button type="submit" name="submit">Sign up</button>
    </form>
  </div>
  <?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Töltsd ki az összes mezőt!</p>";
      }
      else if ($_GET["error"] == "invaliduid") {
        echo "<p>Válassz egy másik felhasználónevet!</p>";
      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p>Válassz egy másik email címet!</p>";
      }
      else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Jelszavak nem egyeznek!</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Valami hiba történt!</p>";
      }
      else if ($_GET["error"] == "usernametaken") {
        echo "<p>Felhasználónév foglalt!</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p>Sikeres bejelentkezés!</p>";
      }
    }
  ?>
</section>

<?php
  include_once 'footer.php';
?>
