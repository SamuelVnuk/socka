<?php
require_once('scripts/connection.php');
include('parts/header.php');
include('scripts/getUsers.php');

require_once('articles/connection.php');
//include('articles/header.php');
?>

<main class="container">
    <p>
    <h1 style="text-align: center">Články</h1>
    <?php
    $page = isset($_GET["page"]) ? $_GET["page"] : "";
    if ($page < 1) {
        $page = 1;
    }

    for ($i = 0; $i < $page; $i++) {
        $x = 0 + 12 * $i;
        $y = 11 + 12 * $i;
    }
    ?>
    <div class="container">
        <div class="d-flex row align-items-center">
            <?php
            $sql = "SELECT * FROM articles";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                foreach($result as $row){
                    echo '<div class="p-0 col-md-4 col-sm-5 col-xs-6" style="text-align: center">';
                    echo '<img src="articles/'.$row["Cover_image"].'" alt="'.$row["Title"].'" style="width: 250px">';
                    echo '<p><span style="font-weight: bold;">Title:</span>'.$row["Title"];
                    echo '<br><span style="font-weight: bold;">Author:</span>'.$row["Autor"];
                    echo '<p>'.$row["Text"];
                    echo '</div>';
                }
            }else{
                echo "V databáze sa nenachádzajú žiadne články";
            }
            ?>

        </div>
    </div>
    <nav>
        <ul style="margin-left: 550px;" class="pagination">
            <li class="page-item">
                <a class="page-link" href="../articles/index.php<?php echo "?page=" . $page - 1; ?>" aria-label="Predchadzajuca stranka">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Predchadzajuca</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="../articles/index.php<?php echo "?page=" . $page + 1; ?>" aria-label="Dalsia stranka">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Dalsia</span>
                </a>
            </li>
        </ul>
    </nav>
</main>





<main class="container">
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
   <?php foreach ($users as $user) : ?>
    <li class="list-group-item list-group-item-action d-flex row align-items-center">     
            <span class="text-danger col-1"> <?php echo $user["id"] ?></span>
            <div class="col-2">
                <img src="images/<?php echo $user["avatar"]?>" alt="<?php echo $user["username"]?>" style="width: 30px">
            </div>
            <span class="col-2"> <?php echo $user["username"] ?></span>
            <span class="col-2"> <?php echo $user["surname"] ?></span>
            <span class="col-2"> <?php echo $user["email"] ?></span>
            <div class="col-2 d-flex justify content-center">
                <a style="margin-right: 5px" href="pages/profile.php<?php echo "?user=".$user["id"]; ?>"class="btn btn-success">Profil</a>
                <a href="scripts/delete_script.php?id=<?php echo $user["id"];?>" class="btn btn-danger mr-2">Zmazať</a>
            </div>
        </li>
   
   <?php endforeach ?>
   
   
</main>
<?php include('parts/footer.php'); ?>