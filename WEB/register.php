<!DOCTYPE html>
<html>
<style>
  .container {
      text-align: center;
  }
  h1 {
    padding-top: 50px;
  } 
</style>
<title>Register</title>
 
 
  <body>
  <?php 
    include('parts/header.php');
    /*include('scripts/register_script.php');*/
  ?>
  <?php $email = isset($_SESSION['em']) ? $_SESSION['em'] : ""; ?>
  <?php $meno = isset($_SESSION['user']) ? $_SESSION['user'] : ""; ?>
  <?php $heslo = isset($_SESSION["pass"]) ? $_SESSION["pass"] : ""; ?>
  <?php $hesloOpak = isset($_SESSION["pass-repeat"]) ? $_SESSION["pass-repeat"] : ""; ?>
  <?php $priezvisko = isset($_SESSION["sur"]) ? $_SESSION["sur"] : ""; ?>
  <?php $message = isset($_GET["message"]) ? $_GET["message"] : "";?>
    <main>
      <form action="scripts/register_script.php" method="post">
 
        <div class="container">
          <h1>Registracia</h1>
          <hr>
          <p><label for="username"><b>Meno</b></label> 
              <br><input type="text" placeholder="Zadajte meno" name="username" id="username" value="<?php echo $meno; ?>" required>
 
          <p><label for="surname"><b>Priezvisko</b></label>
            <br><input type="text" placeholder="Zadajte Priezvisko" name="surname" id="surname" value="<?php echo $priezvisko; ?>" required>
 
          <p><label for="email"><b>Email</b></label>
            <br><input type="text" placeholder="Zadajte Email" name="email" id="email" value="<?php echo $email; ?>" required>
 
          <p><label for="psw"><b>Heslo</b></label>
            <br><input type="password" placeholder="Zadajte Heslo" name="psw" id="psw" value="<?php echo $heslo; ?>" required>
 
          <p><label for="psw-repeat"><b>Heslo znova</b></label>
            <br><input type="password" placeholder="Znovu Zadajte heslo" name="psw-repeat" id="psw-repeat" value="<?php echo $hesloOpak; ?>" required>
 
          <p><button type="submit" class="btn btn-secondary">Registrovat sa</button>
            <hr>
          <p>
          <p style="font-weight: bolder;">Uz mate ucet?
          <p><a href="login.php" class="btn btn-info">Prihlaste sa</a></p>
          <p class="text-danger"><?php echo $message ?></p>
        </div>
 
      </form>
    </main>
  </body>
  <?php include('parts/footer.php')?>
</html>