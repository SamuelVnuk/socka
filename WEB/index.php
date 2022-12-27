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
        if (!isset($_GET['category'])) {

        ?>
    <form acction="" method="post">
        <div class="input-group">
            <input type="text" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
            <input class="btn btn-primary" type="submit" name="Submit"></input>
        </div>
        <br>
    </form>
    <?php } ?>
    <?php


    if (!isset($_GET['url']) && !isset($_GET['edit'])) {
        if (isset($_GET['category'])) {
            $categ = $_GET['category'];
            $categ = trim($categ, '"');

            $colorSport = $colorPolitika = $colorModa = $colorEkonomika = $colorKultura = $colorZdravie = $colorGaming = trim("white", '"');
            ;

            if ($categ == "Sport")
                $colorSport = "#b0b1b6";
            if ($categ == "Politika")
                $colorPolitika = "#b0b1b6";
            if ($categ == "Moda")
                $colorModa = "#b0b1b6";
            if ($categ == "Ekonomika")
                $colorEkonomika = "#b0b1b6";
            if ($categ == "Kultura")
                $colorKultura = "#b0b1b6";
            if ($categ == "Zdravie")
                $colorZdravie = "#b0b1b6";
            if ($categ == "Gaming")
                $colorGaming = "#b0b1b6";

            function displayDivActive($string, $color)
            {
                echo '<a href=index.php?category=' . $string . ' style="text-decoration:none; color:black;">';
                echo '<div class="chip" style="width: 150px; background:' . $color . '; border: 2px solid black; border-radius: 10px; text-align:center;">' . $string . '</div>';
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
        } else {
            function displayDivInctive($string)
            {
                echo '<a href=index.php?category=' . $string . ' style="text-decoration:none; color:black;">';
                echo '<div class="chip" style="width: 150px; border: 2px solid black; border-radius: 10px; text-align:center;">' . $string . '</div>';
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
            if (!isset($_GET['edit'])) {
                if (isset($_GET['url'])) {
                    $url = $_GET['url'];

                    if ($url) {
                        $url = trim($url, '"');
                        $sqla = "SELECT * FROM articles WHERE url_ar = '$url'";
                        $resulta = $conn->query($sqla);

                        while ($row = $resulta->fetch_row()) {
                            $title = $row[1];
                            $author = $row[4];
                            $text = $row[2];
                            $cover_image = $row[3];
                            $id_author = $row[7];
                        }

                        echo '<h1>' . $title . '</h1>';
                        echo '<h2>' . $author . '</h2>';
                        echo '<p>' . $text . '</p>';
                        echo '<img src="articles/' . $cover_image . '" alt=""' . $title . '">';
                    }
                } else {
                    if (isset($_GET['category'])) {
                        $cat = $_GET['category'];
                        $cat = trim($cat, '"');
                        $sql = "SELECT * FROM articles WHERE category = '$cat'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            foreach ($result as $row) {
                                echo '<div class="p-0 col-md-4 col-sm-5 col-xs-6" style="text-align: center; ">';
                                echo '<a href=index.php?url="' . $row['url_ar'] . '" target="_blank" style="text-decoration:none; color:black;">';
                                if($row["Cover_image"]!=null){
                                   echo '<img src="articles/' . $row["Cover_image"] . '" alt=""' . $row["Title"] . '" style="width: 250px">'; 
                                }
                                echo '<p><span style="font-weight: bold;">Title:</span>' . $row["Title"];
                                echo '<br><span style="font-weight: bold;">Author:</span>' . $row["Autor"];
                                echo '<p>' . $row["Text"];
                                echo '</div></a>';
                            }
                        }
                    } else {
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


                        $articles = [];
                        $displayNumOfArticles = 9;
                        $c = 0;
                        $page = isset($_GET["page"]) ? $_GET["page"] : "";
                        $pages = intval($page);
                        $h = $displayNumOfArticles * $pages - 1;

                        if (isset($_POST['Submit'])) {
                            $search = mysqli_real_escape_string($conn, $_POST['search']);
                            $sqls = "SELECT * FROM articles WHERE `Title` LIKE '%$search%' OR `Text` LIKE '%$search%' OR `Autor` LIKE '%$search%' OR `category` LIKE '%$search%';";
                            $results = mysqli_query($conn, $sqls);
                            $queryResult = mysqli_num_rows($results);

                            if ($queryResult > 0) {
                                while ($article = mysqli_fetch_array($results)) {

                                    $h += 1;
                                    if ($h + $displayNumOfArticles < $pages * $displayNumOfArticles + ($pages * $displayNumOfArticles)) {
                                        continue;
                                    }
            ?>
            <div class="p-0 col-md-4 col-sm-5 col-xs-6" style="text-align: center; ">
                <a href="index.php<?php echo "?url=" . $article["url_ar"]; ?>" target="_blank"
                    style="text-decoration:none; color:black;">
                    <?php
                    if ($article["Cover_image"] != null) {
                    ?>
                    <img src="articles/<?php echo $article["Cover_image"] ?> " alt=" <?php echo $article["Title"] ?>"
                        style="width: 250px">
                        <?php }?>
                    <p><span style="font-weight: bold;">Title:</span>
                        <?php echo $article["Title"] ?>
                        <br><span style="font-weight: bold;">Author:</span>
                        <?php echo $article["Autor"] ?>
                        <p>
                            <?php echo $article["Text"] ?>
            </div></a>

            <?php
                                    $c += 1;
                                    if ($c == $displayNumOfArticles)
                                        break;

                                }
                            } else {
                                echo "No results";
                            }
                        } else if (empty($_POST['Submit'])) {

                            $sql = "SELECT * FROM articles";
                            $results = mysqli_query($conn, $sql);
                            $queryResult = mysqli_num_rows($results);

                            if ($queryResult > 0) {
                                while ($article = mysqli_fetch_array($results)) {

                                    $h += 1;
                                    if ($h + $displayNumOfArticles < $pages * $displayNumOfArticles + ($pages * $displayNumOfArticles)) {
                                        continue;
                                    }
                        ?>
            <div class="p-0 col-md-4 col-sm-5 col-xs-6" style="text-align: center; ">
                <a href="index.php<?php echo "?url=" . $article["url_ar"]; ?>" target="_blank"
                    style="text-decoration:none; color:black;">
                    <?php
                    if ($article["Cover_image"] != null) {
                    ?>
                    <img src="articles/<?php echo $article["Cover_image"] ?> " alt=" <?php echo $article["Title"] ?>"
                        style="width: 250px">
                        <?php }?>
                    <p><span style="font-weight: bold;">Title:</span>
                        <?php echo $article["Title"] ?>
                        <br><span style="font-weight: bold;">Author:</span>
                        <?php echo $article["Autor"] ?>
                        <p>
                            <?php echo $article["Text"] ?>
            </div></a>

            <?php
                                    $c += 1;
                                    if ($c == $displayNumOfArticles)
                                        break;

                                }
                            }
                        }


                    }
                }
            }


                        ?>

        </div>
    </div>

    <?php
    if (!isset($_GET['edit'])) {
        if (!isset($_GET['url'])) {
            $page = isset($_GET["page"]) ? $_GET["page"] : "";

            if ($page < 1) {
                $page = 1;
            }

            function changePage($currentPage, $argument)
            {
                if ($argument == "-1") {
                    if ($currentPage == 1)
                        return $currentPage;
                    else
                        $newPage = $currentPage - 1;
                } else {
                    $newPage = $currentPage + 1;
                }
                return $newPage;
            }
    ?>
    <nav>
        <ul style="margin-left: 550px;" class="pagination">
            <li class="page-item">
                <a class="page-link" href="index.php<?php $page = changePage($page, "-1");
            echo "?page=" . $page;
            $page = isset($_GET["page"]) ? $_GET["page"] : "";
            if ($page < 1) {
                $page = 1;
            } ?>" aria-label="Predchadzajuca stranka">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Predchadzajuca</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="index.php<?php $page = changePage($page, "+1");
            echo "?page=" . $page;
            $page = isset($_GET["page"]) ? $_GET["page"] : "";
            if ($page < 1) {
                $page = 1;
            } ?>" aria-label="Dalsia stranka">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Dalsia</span>
                </a>
            </li>
        </ul>
    </nav>
    <?php
        } else {
            include('scripts/connection.php');
            if (isset($_SESSION["username"])) {
                $user = $_SESSION["username"];
                $query = "SELECT avatar,id,administrator FROM users WHERE username='$user'";
                $result = $conn->query($query);

                while ($row = $result->fetch_assoc()) {
                    $avatar = $row["avatar"];
                    $id = $row["id"];
                    $admin = $row["administrator"];
                }

                if ($admin == 1 || $id == $id_author) {
    ?>
    <div class="btns" style="text-align:center;">
        <a href="scripts/deleteArticle_script.php?url=<?php echo $url; ?>" class="btn btn-del"
            style="background:red; margin:50px 0px 100px 0px; color: white;"> <b>Zmazať</b></a>
        <a href="index.php?edit=<?php echo $url; ?>" class="btn btn-del"
            style="background:grey; margin:50px 0px 100px 0px; color: white;"> <b>Upravit</b></a>
        <a href="index.php?edit=<?php echo $url; echo '&comm';?>" class="btn btn-del"
            style="background:blue; margin:50px 0px 100px 0px; color: white;"> <b>Komentovat</b></a>

    </div>
    <?php

        $comm_article_id=$_GET['url'];
        $query_c = "SELECT text_comm, name_user, id_user FROM db.comm WHERE id_article='$comm_article_id'";
        $result_c = $conn->query($query_c);

        while ($row = $result_c->fetch_assoc()) {
            $show_text = $row["text_comm"];
            $show_name_user = $row["name_user"];
            $get_id_user = $row["id_user"];

            $query_u = "SELECT avatar FROM registration.users WHERE id='$get_id_user'";
            $result_u = $conn->query($query_u);
            while ($row = $result_u->fetch_assoc()) {
                $show_avatar = $row["avatar"];
            }
            
            echo '<div class="comm_holder" style="border:2px solid black; min-height:200px; padding:5px;">';
            echo '<div class="logo-name" style="display:flex;">';
            echo '<img src="images/'.$show_avatar.'" style= "max-width:40px;max-height:40px;">';
            echo '<div class="name_holder" style="font-weight:bold; font-size:30px">'.$show_name_user.'</div>';
            echo '</div>'; 
            echo '<div class="text_holder" style="">'.$show_text.'</div>';
            echo '</div>';
            echo '<br>';
        }
                   
        
    ?>
    <?php
                }
            }
        }
    }
    ?>
    <?php
    if (isset($_GET['comm'])) {
        echo'<h1>Uverejnit komentar</h1>';
        ?>
        <form  method="post">
            <p><label for="Text"><b>Komentar</b></label>
            <br><textarea rows="15" style="width: 700px;" type="text" name="Text"
            id="Text"></textarea>
        
            <p><button name="submit" type="submit" class="btn btn-outline-danger">Upload</button>
        </form>
        
        <?php 

        $comm_id_article = $_GET['edit'];
        
        if ($_POST) {
            $comm_name_user = $_SESSION["username"];
            echo $comm_name_user;
            $query = "SELECT id FROM registration.users WHERE username='$comm_name_user'";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $comm_id_user = $row["id"];
            }

            $comm_text_comm = $_POST['Text'];

            $sql = "INSERT INTO db.comm (id_user, name_user, text_comm, id_article)
                VALUES('$comm_id_user', '$comm_name_user', '$comm_text_comm', '$comm_id_article')";
                if ($conn->query($sql) == true){       
                    header('Location: index.php?url='.$comm_id_article.'');
                }
                else{
                    echo "Error" . $sql . "<br>" . $conn->error;
                }
        }
    }
   
    if (isset($_GET['edit'])&& !isset($_GET['comm'])) {
        $edit = $_GET['edit'];
        $edit = trim($edit, '"');
        $sqlb = "SELECT * FROM articles WHERE url_ar = '$edit'";
        $resultb = $conn->query($sqlb);

        while ($row = $resultb->fetch_row()) {
            $title = $row[1];
            $text = $row[2];
            $cover_image = $row[3];
            $category = $row[8];
        }

        if ($_POST) {
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
            <p>
            <h1>Upravit clanok</h1>
            <hr>
            <p><label for="Title"><b>Title</b></label>
                <br><input type="text" name="Title" id="Title" value="<?php echo $title ?>">

            <p><label for="Text"><b>Text</b></label>
                <br><textarea rows="15" style="width: 700px;" type="text" name="Text"
                    id="Text"><?php echo $text ?></textarea>

           
           
            <div class="buttonwrapper" style="text-align:center; padding-left: 42%;">
                <p><select id="Img" name="Img" style="width: 30%;"
                        class="form-select form-select-lg form-select-border-width-0" aria-label=".form-select-lg example">
                        <option disabled selected>
                            <?php 
                                if($cover_image != null){
                                    echo $cover_image;
                                }else{
                                    echo "Vyberte obrazok";
                                }
                            ?>
                        </option>
                        <option value="bussiness_man.jpg">Bussinessman</option>
                        <option value="stonks.jpg">Stonks</option>
                        <option value="poznamky.jpg">Poznamky</option>
                        <option value="house.jpg">House</option>
                    </select>

                <p><select id="Category" name="Category" style="width: 30%;"
                        class="form-select form-select-lg form-select-border-width-0" aria-label=".form-select-lg example">
                        <option disabled selected>
                                <?php
                                    
                                if($category != null){
                                    echo $category;
                                }else{
                                    echo "Vyberte kategoriu";
                                }
                                ?>
                        </option>
                        <option value="Sport">Sport</option>
                        <option value="Politika">Politika</option>
                        <option value="Moda">Moda</option>
                        <option value="Ekonomika">Ekonomika</option>
                        <option value="Kultura">Kultura</option>
                        <option value="Zdravie">Zdravie</option>
                        <option value="Gaming">Gaming</option>
                    </select>
            </div>

            <p><button type="submit" class="btn btn-outline-danger">Edit</button>
        </div>

    </form>
    <?php
    }
    ?>
</main>
<?php include('parts/footer.php'); ?>