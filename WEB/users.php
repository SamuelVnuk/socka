<?php
require_once('scripts/connection.php');
include('parts/header.php');
include('scripts/getUsers.php');


?>

<main class="container">
    <br>
    <form acction="" method="post">
        <div class="input-group">
            <input type="text" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
            <input class="btn btn-primary" type="submit" name="Submit"></input>
        </div>
        <br>
    </form>

    <h1 class="m-4 text-uppercase">Zoznam uživateľov</h1>
    <ul class="list-group">
        <li class="list-group-item list-group-item-action active d-flex row">
            <span class="col-1"> ID.</span>
            <span class="col-2"> Avatar</span>
            <span class="col-2"> Username</span>
            <span class="col-2"> Surname</span>
            <span class="col-2"> Email</span>
            <span class="col-2"> Akcia</span>
        </li>
    </ul>
    

    <?php
   $userss = [];
   if (isset($_POST['Submit'])) {
       $search = mysqli_real_escape_string($conn, $_POST['search']);
       $sqls = "SELECT * FROM users WHERE `username` LIKE '%$search%' OR `surname` LIKE '%$search%' OR `email` LIKE '%$search%'";
       $results = mysqli_query($conn, $sqls);
       $queryResult = mysqli_num_rows($results);

       if ($queryResult > 0) {
           // Loop through the result set and display the data
           while ($Suser = mysqli_fetch_array($results)) {
   ?>
    <li class="list-group-item list-group-item-action d-flex row align-items-center">
        <span class="text-danger col-1">
            <?php echo $Suser["id"] ?>
        </span>
        <div class="col-2">
            <img src="images/<?php echo $Suser["avatar"] ?>" alt="<?php echo $Suser["username"] ?>" style="width: 30px">
        </div>
        <span class="col-2">
            <?php echo $Suser["username"] ?>
        </span>
        <span class="col-2">
            <?php echo $Suser["surname"] ?>
        </span>
        <span class="col-2">
            <?php echo $Suser["email"] ?>
        </span>
        <div class="col-2 d-flex justify content-center">
            <a style="margin-right: 5px" href="profile.php<?php echo "?user=" . $Suser["id"]; ?>"
                class="btn btn-success">Profil</a>
            <a href="scripts/delete_script.php?id=<?php echo $Suser["id"]; ?>" class="btn btn-danger mr-2">Zmazať</a>
        </div>
    </li>
    <?php
           }
       } else {
           echo "No results";
       }
   }else{
    foreach ($users as $user): ?>
        <li class="list-group-item list-group-item-action d-flex row align-items-center">
            <span class="text-danger col-1">
                <?php echo $user["id"] ?>
            </span>
            <div class="col-2">
                <img src="images/<?php echo $user["avatar"] ?>" alt="<?php echo $user["username"] ?>" style="width: 30px">
            </div>
            <span class="col-2">
                <?php echo $user["username"] ?>
            </span>
            <span class="col-2">
                <?php echo $user["surname"] ?>
            </span>
            <span class="col-2">
                <?php echo $user["email"] ?>
            </span>
            <div class="col-2 d-flex justify content-center">
                <a style="margin-right: 5px" href="profile.php<?php echo "?user=" . $user["id"]; ?>"
                    class="btn btn-success">Profil</a>
                <a href="scripts/delete_script.php?id=<?php echo $user["id"]; ?>" class="btn btn-danger mr-2">Zmazať</a>
            </div>
        </li>
    
        <?php endforeach;
   }
?>


</main>
<?php include('parts/footer.php'); ?>