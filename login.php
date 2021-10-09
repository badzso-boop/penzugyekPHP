<?php
  include_once 'header.php';
?>

<section class="signup-form">
  <h2>Log In</h2>
  <div class="signup-form-form">
    <form action="includes/login.inc.php" method="post">
      <input type="text" name="uid" placeholder="Username/Email...">
      <input type="password" name="pwd" placeholder="Password...">
      <button type="submit" name="submit">Sign up</button>
    </form>
  </div>
  <?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Töltsd ki az összes mezőt!</p>";
      }
      else if ($_GET["error"] == "wronglogin") {
        echo "<p>Hibás belépés!</p>";
      }
    }
  ?>
</section>

<?php
  include_once 'footer.php';
?>
