<?php
require_once('scripts/connection.php');
include('parts/header.php');

?>
<style>
  .container {
    text-align: center;
  }
  h1 {
    padding-top: 50px;
  }

</style>
<?php $message = isset($_GET["message"]) ? $_GET["message"] : "";?>
<main class>
  <form action="scripts/avatar_change_script.php" method="post">
    <div class="container">
      <h1>Zmena avatara</h1>
      <hr>
      <img src="images/<?php  echo $avatar;?>"  style="width: 200px">
      <p><select name="avatar"style="margin-top: 30px;" class="form-select form-select-lg form-select-border-width-2" aria-label=".form-select-lg example">
          <option disabled selected>Vyberte avatara</option>
          <option value="user.png">User</option>
          <option value="sus.png">Sus</option>
          <option value="200.gif">Banana</option>
        </select>
      <p><button type="submit" class="btn btn-outline-secondary">Zmenit</button>
      <p class="text-danger"><?php echo $message ?></p>
    </div>
  </form>
</main>