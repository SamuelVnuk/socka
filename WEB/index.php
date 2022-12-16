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
            if(!isset($_GET['url']) && !isset($_GET['edit'])){
                if(isset($_GET['category'])){
                    $categ = $_GET['category'];
                    $categ = trim($categ,'"');
 
                    $colorSport = $colorPolitika = $colorModa = $colorEkonomika = $colorKultura = $colorZdravie = $colorGaming = trim("white",'"');;
 
                    if($categ == "Sport") $colorSport="#b0b1b6";
                    if($categ == "Politika") $colorPolitika="#b0b1b6";
                    if($categ == "Moda") $colorModa="#b0b1b6";
                    if($categ == "Ekonomika") $colorEkonomika="#b0b1b6";
                    if($categ == "Kultura") $colorKultura="#b0b1b6";
                    if($categ == "Zdravie") $colorZdravie="#b0b1b6";
                    if($categ == "Gaming") $colorGaming="#b0b1b6";
 
                    function displayDivActive($string, $color){
                        echo '<a href=index.php?category='.$string.' style="text-decoration:none; color:black;">';
                        echo '<div class="chip" style="width: 150px; background:'.$color.'; border: 2px solid black; border-radius: 10px; text-align:center;">'.$string.'</div>';
                        echo '</a>';
                    }
 
                    echo '<div class="CHIPS", style="width:100%; height:50px; display:flex; justify-content: space-evenly;">';
                    displayDivActive("Sport", $colorSport);
                    displayDivActive("Politika", $colorPolitika);
                    displayDivActive("Moda", $colorModa);
                    displayDivActive("Ekonomika", $colorEkonomika);
                    displayDivActive("Kultura", $colorKultura);
                    displayDivActive("Zdravie", $colorZdravie);
                    displayDivActive("Gaming", $colorGaming);
                    echo '</div>';
                    echo '<h1 style="text-align: center;">Články</h1>';
                }else{
                    function displayDivInctive($string){
                        echo '<a href=index.php?category='.$string.' style="text-decoration:none; color:black;">';
                        echo '<div class="chip" style="width: 150px; border: 2px solid black; border-radius: 10px; text-align:center;">'.$string.'</div>';
                        echo '</a>';
                    }
                    echo '<div class="CHIPS", style="width:100%; height:50px; display:flex; justify-content: space-evenly;">';
                    displayDivInctive("Sport");
                    displayDivInctive("Politika");
                    displayDivInctive("Moda");
                    displayDivInctive("Ekonomika");
                    displayDivInctive("Kultura");
                    displayDivInctive("Zdravie");
                    displayDivInctive("Gaming");
                    echo '</div>';
                    echo '<h1 style="text-align: center;">Články</h1>';
                }
            }
        ?>
 
    <div class="container">
        <div class="d-flex row align-items-center">
            <?php
            if(!isset($_GET['edit'])){
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
     
                        $page = isset($_GET["page"]) ? $_GET["page"] : "";
     
                        if ($page < 1) {
                            $page = 1;
                        }
     
                        for ($i = 0; $i < $page; $i++) {
                            $x = 0 + 12 * $i;
                            $y = 11 + 12 * $i;
                        }
     
                        $result = $conn->query($sql);
     
                        $displayNumOfArticles = 9;
     
                        $h=$displayNumOfArticles*$page-1;
                        $c = 0;
                        if($result->num_rows > 0){
                            foreach($result as $row){
                                $h+=1;
                                if($h+$displayNumOfArticles < $page*$displayNumOfArticles+($page*$displayNumOfArticles)){
                                    continue;
                                }
                                echo '<div class="p-0 col-md-4 col-sm-5 col-xs-6" style="text-align: center; ">';
                                echo '<a href=index.php?url="'.$row['url_ar'].'" target="_blank" style="text-decoration:none; color:black;">';
                                echo '<img src="articles/'.$row["Cover_image"].'" alt=""'.$row["Title"].'" style="width: 250px">';
                                echo '<p><span style="font-weight: bold;">Title:</span>'.$row["Title"];
                                echo '<br><span style="font-weight: bold;">Author:</span>'.$row["Autor"];
                                echo '<p>'.$row["Text"];
                                echo '</div></a>'; 
                                $c += 1;
                                if($c==$displayNumOfArticles) break;
                            }
     
                        }else{
                            echo "V databáze sa nenachádzajú žiadne články";
                        } 
                    }
                }
            }
            
            ?>
 
        </div>
    </div> 
 
    <?php 
        if (!isset($_GET['edit'])){
        if(!isset($_GET['url'])){
            $page = isset($_GET["page"]) ? $_GET["page"] : "";
 
            if ($page < 1) {
                $page = 1;
            }
 
            function changePage($currentPage, $argument){
                if($argument == "-1"){
                    if($currentPage == 1) return $currentPage;
                    else $newPage = $currentPage-1;
                }else{
                    $newPage = $currentPage+1;
                }
                return $newPage;
            }
    ?>
    <nav>
        <ul style="margin-left: 550px;" class="pagination">
            <li class="page-item">
                <a class="page-link" href="index.php<?php $page=changePage($page, "-1"); echo "?page=" .$page; $page = isset($_GET["page"]) ? $_GET["page"] : ""; if($page < 1){$page = 1;} ?>" aria-label="Predchadzajuca stranka">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Predchadzajuca</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="index.php<?php $page=changePage($page, "+1"); echo "?page=" .$page; $page = isset($_GET["page"]) ? $_GET["page"] : ""; if($page < 1){$page = 1;} ?>" aria-label="Dalsia stranka">
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
                        <a href="index.php?edit=<?php echo $url;?>" class="btn btn-del"style="background:grey; margin:50px 0px 100px 0px; color: white;"> <b>Upravit</b></a>
                    </div>  
                    <?php
                }
            }
        }
    }
    ?>
    <?php 
        if(isset($_GET['edit'])){
            $edit = $_GET['edit'];
            $edit = trim($edit,'"');
            $sqlb = "SELECT * FROM articles WHERE url_ar = '$edit'";
            $resultb = $conn ->query($sqlb);
        
            while($row = $resultb->fetch_row()){
                $title = $row[1];
                $text = $row[2];
                $cover_image = $row[3];
                $category = $row[8];
            }

            if($_POST){
                $newTitle = $_POST['Title'];
                $newText = $_POST['Text'];
                $newImg = $_POST['Img'];
                $newCat = $_POST['Category'];
        
                $sqlu = "UPDATE articles SET Title = '$newTitle', Text = '$newText', Cover_image = '$newImg', category = '$newCat' where url_ar='$edit'";
                $conn->query($sqlu);
                header('Location: index.php');
            }

        ?>
        <form action="" method="post">

        <div style="text-align: center">
            <p><h1>Upravit clanok</h1>
            <hr>
            <p><label for="Title"><b>Title</b></label>
                <br><input type="text" name="Title" id="Title" value="<?php echo $title ?>">

            <p><label for="Text"><b>Text</b></label>
                <br><textarea rows="15" style="width: 700px;"type="text" name="Text" id="Text"><?php echo $text ?></textarea>

            <p><select id="Img" name="Img" style="width: 200px; margin-left: 860px;" class="form-select form-select-lg form-select-border-width-0" aria-label=".form-select-lg example">
                    <option disabled selected>Vyberte obrazok</option>
                    <option value="bussiness_man.jpg">Bussinessman</option>
                    <option value="stonks.jpg">Stonks</option>
                    <option value="poznamky.jpg">Poznamky</option>
                    <option value="house.jpg">House</option>
                </select>

            <p><select id="Category" name="Category" style="width: 200px; margin-left: 860px;" class="form-select form-select-lg form-select-border-width-0" aria-label=".form-select-lg example">
                    <option disabled selected>Vyberte kategoriu</option>
                    <option value="Sport">Sport</option>
                    <option value="Politika">Politika</option>
                    <option value="Moda">Moda</option>
                    <option value="Ekonomika">Ekonomika</option>
                    <option value="Kultura">Kultura</option>
                    <option value="Zdravie">Zdravie</option>
                    <option value="Gaming">Gaming</option>
                </select>

            <p><button type="submit" class="btn btn-outline-danger">Edit</button>
        </div>

    </form>
    <?php
        }
    ?>
</main>
<?php include('parts/footer.php'); ?>