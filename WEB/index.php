<?php
require_once('scripts/connection.php');
include('parts/header.php');
include('scripts/getUsers.php');

require_once('articles/connection.php');
//include('articles/header.php');
?>

<main class="container">
    <p>
        <?php 
            if(!isset($_GET['url'])){
                echo '<div class="CHIPS", style="width:100%; height:50px; display:flex; justify-content: space-evenly;">';
              
                echo '<a href=index.php?category="Sport" style="text-decoration:none; color:black;">';
                echo '<div class="chip" style="width: 150px; border: 2px solid black; border-radius: 10px; text-align:center;">Sport</div>';
                echo '</a>';

                echo '<div class="chip active" style="background:orange">Sport</div>';
            
                echo '<a href=index.php?category="Politika" style=" color: black; text-decoration:none;">';
                echo '<div class="chip" style="width: 150px; border: 2px solid black; border-radius: 10px; text-align:center;">Politika</div>';
                echo '</a>';

                echo '<a href=index.php?category="Moda" style=" color: black; text-decoration:none;">';
                echo '<div class="chip" style="width: 150px; border: 2px solid black; border-radius: 10px; text-align:center;">Moda</div>';
                echo '</a>';

                echo '<a href=index.php?category="Ekonomika" style=" color: black; text-decoration:none;">';
                echo '<div class="chip" style="width: 150px; border: 2px solid black; border-radius: 10px; text-align:center;">Ekonomika</div>';
                echo '</a>';

                echo '<a href=index.php?category="Kultura" style=" color: black; text-decoration:none;">';
                echo '<div class="chip" style="width: 150px; border: 2px solid black; border-radius: 10px; text-align:center;">Kultura</div>';
                echo '</a>';

                echo '<a href=index.php?category="Zdravie" style=" color: black; text-decoration:none;">';
                echo '<div class="chip" style="width: 150px; border: 2px solid black; border-radius: 10px; text-align:center;">Zdravie</div>';
                echo '</a>';

                echo '<a href=index.php?category="Gaming" style=" color: black; text-decoration:none;">';
                echo '<div class="chip" style="width: 150px; border: 2px solid black; border-radius: 10px; text-align:center;">Gaming</div>';
                echo '</a>';

                echo '</div>';
                echo '<h1 style="text-align: center;">Články</h1>';
                
            }
        ?>
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
            if(isset($_GET['url'])){
                $url = $_GET['url'];
              
                if($url){
                  $url = trim($url,'"');
                  $sqla = "SELECT * FROM articles WHERE url_ar = '$url'";
                  $resulta = $conn ->query($sqla);
                  while($row = $resulta->fetch_row()){
                    $title = $row[1];
                    $author = $row[4];
                    $text = $row[2];
                    $cover_image = $row[3];
                    $id_author = $row[7];
                  }
          
                 echo '<h1>'.$title.'</h1>';
                 echo '<h2>'.$author.'</h2>';
                 echo '<p>'.$text.'</p>';
                 echo '<img src="articles/'.$cover_image.'" alt=""'.$title.'">';
                }
            }else{
                
                if(isset($_GET['category'])){
                    $cat = $_GET['category'];
                    $cat = trim($cat,'"');
                    $sql = "SELECT * FROM articles WHERE category = '$cat'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        foreach($result as $row){
                            echo '<div class="p-0 col-md-4 col-sm-5 col-xs-6" style="text-align: center; ">';
                            echo '<a href=index.php?url="'.$row['url_ar'].'" target="_blank" style="text-decoration:none; color:black;">';
                            echo '<img src="articles/'.$row["Cover_image"].'" alt=""'.$row["Title"].'" style="width: 250px">';
                            echo '<p><span style="font-weight: bold;">Title:</span>'.$row["Title"];
                            echo '<br><span style="font-weight: bold;">Author:</span>'.$row["Autor"];
                            echo '<p>'.$row["Text"];
                            echo '</div></a>';
                        }
                    }
                }else{
                    $sql = "SELECT * FROM articles";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        foreach($result as $row){
                            echo '<div class="p-0 col-md-4 col-sm-5 col-xs-6" style="text-align: center; ">';
                            echo '<a href=index.php?url="'.$row['url_ar'].'" target="_blank" style="text-decoration:none; color:black;">';
                            echo '<img src="articles/'.$row["Cover_image"].'" alt=""'.$row["Title"].'" style="width: 250px">';
                            echo '<p><span style="font-weight: bold;">Title:</span>'.$row["Title"];
                            echo '<br><span style="font-weight: bold;">Author:</span>'.$row["Autor"];
                            echo '<p>'.$row["Text"];
                            echo '</div></a>';
                        }

                    }else{
                        echo "V databáze sa nenachádzajú žiadne články";
                    } 
                }
            }
            
            ?>

        </div>
    </div> 
       
    <?php 
        if(!isset($_GET['url'])){
    ?>
    <nav>
        <ul style="margin-left: 550px;" class="pagination">
            <li class="page-item">
                <a class="page-link" href="index.php<?php echo "?page=" . $page - 1; ?>" aria-label="Predchadzajuca stranka">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Predchadzajuca</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="index.php<?php echo "?page=" . $page + 1; ?>" aria-label="Dalsia stranka">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Dalsia</span>
                </a>
            </li>
        </ul>
    </nav>
    <?php 
        }else{
            include('scripts/connection.php');
            if(isset($_SESSION["username"])){
                $user = $_SESSION["username"];
                $query = "SELECT avatar,id,administrator FROM users WHERE username='$user'";
                $result = $conn->query($query);
                
                while ($row = $result->fetch_assoc()) {
                    $avatar=$row["avatar"];
                    $id=$row["id"];
                    $admin = $row["administrator"];
                }

                if ($admin == 1 || $id == $id_author){
                   ?>
                    <div class= "btns" style="text-align:center;">
                        <a href="scripts/deleteArticle_script.php?url=<?php echo $url;?>" class="btn btn-del"style="background:red; margin:50px 0px 100px 0px; color: white;"> <b>Zmazať</b></a>
                    </div>  
                    <?php
                }
            }
        }
    ?>
</main>

<script>
    let list = document.querySelectorAll('.chip');

    list[0].className = 'chip active';
    list[1].className = 'chip';
    list[2].className = 'chip active';
    list[3].className = 'chip';
    list[4].className = 'chip';
    list[5].className = 'chip';
    list[6].className = 'chip';
</script>

<?php include('parts/footer.php'); ?>