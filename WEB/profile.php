<?php
require_once('scripts/connection.php');
include('parts/header.php');
include('scripts/profile_script.php');
?>



<main class="container">
    <h1 class="m-4 text-uppercase">Profil</h1>

    <?php foreach ($users as $user) : ?>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-4"><img src="images/<?php echo $user["avatar"] ?>" alt="<?php echo $user["username"] ?>" style="width: 300px;">
                    <?php if (isset($_SESSION["username"])) :
                        if ($_SESSION["username"] == $user["username"]) :?>
                            <a href="avatar_change.php" class="btn btn-info" style="margin-left: 70px; margin-top: 20px;">Zmenit avatara</a>
                    <?php endif;
                    endif; ?>
                </div>
                <div class="col-6">
                    <p>

                    <div class="row">
                        <div class="col-4 list-group-item active">ID</div>
                        <div class="col-4 border-top list-group-item"><?php echo $user["id"] ?></div>

                        <div class="w-100"></div>

                        <div class="col-4 list-group-item active">Meno</div>
                        <div class="col-4 list-group-item"><?php echo $user["username"] ?></div>

                        <div class="w-100"></div>

                        <div class="col-4 list-group-item active">Priezvisko</div>
                        <div class="col-4 list-group-item"><?php echo $user["surname"] ?></div>

                        <div class="w-100"></div>

                        <div class="col-4 list-group-item active">Email</div>
                        <div class="col-4 list-group-item"><?php echo $user["email"] ?></div>
                        <div style="text-align: center; margin-top: 50px;">
                            <?php if (isset($_SESSION["username"])) :
                                if ($_SESSION["username"] == $user["username"]) :?>
                                    <a style="margin-right: 200px;" href="password_change.php" class="btn btn-danger">Zmenit heslo</a>
                            <?php endif;
                            endif; ?>
                        </div>

                    <form method="post" action="">
                        <span>Select API</span><br/>
                        <input type="checkbox" name='api[]' value="coin"> Crypto <br/>
                        <input type="checkbox" name='api[]' value="vtip"> Joke <br/>
                        <input type="checkbox" name='api[]' value="obrazok"> Astronomy <br/>

                        <input type="submit" value="Submit" name="submit">
                    </form>

                    <?php
                    $username_API = $_SESSION["username"];
                    if(isset($_POST['submit'])){

                        if(!empty($_POST['api'])) {
                            $new_api = ""; 
                            foreach($_POST['api'] as $value){
                                $new_api = $new_api." ".$value;
                            }

                            $sql = "UPDATE registration.users SET displayed_api='$new_api' WHERE username='$username_API'";
                            if ($conn->query($sql) == true){
                                echo "Uspesne zvolene:<br>";     
                                foreach($_POST['api'] as $value){
                                    if ($value == "coin") echo "Crypto<br>"; 
                                    if ($value == "vtip") echo "Joke<br>";
                                    if ($value == "obrazok") echo "Astronomy<br>";
                                }
                            }
                            else{
                                echo "Error" . $sql . "<br>" . $conn->error;
                            } 
                        } else{
                            $new_api = ""; 
                            $sql = "UPDATE registration.users SET displayed_api='$new_api' WHERE username='$username_API'";
                            if ($conn->query($sql) == true){
                                echo "Zrusene zobrazovanie API";     
                            }
                            else{
                                echo "Error" . $sql . "<br>" . $conn->error;
                            } 
                        }

                    }
?>
                    </div>

                </div>

            </div>

        </div>
    <?php endforeach ?>

</main>
<?php include('parts/footer.php'); ?>