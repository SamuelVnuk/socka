<!DOCTYPE html>
<html>
<title>Create Article</title>

<body>
    <?php include('header.php'); ?>
    <?php $message = isset($_GET["message"]) ? $_GET["message"] : ""; ?>
    <main>
        <form action="../articles/createArticle_script.php" method="post">

            <div style="text-align: center">
                <p><h1>Vytvoriť článok</h1>
                <hr>
                <p><label for="Title"><b>Title</b></label>
                    <br><input type="text" name="Title" id="Title">

                <p><label for="Author"><b>Author</b></label>
                    <br><input type="text" name="Author" id="Author">

                <p><label for="Text"><b>Text</b></label>
                    <br><textarea rows="15" style="width: 700px;"type="text" name="Text" id="Text"></textarea>

                <p><select id="Img" name="Img" style="width: 200px; margin-left: 860px;" class="form-select form-select-lg form-select-border-width-0" aria-label=".form-select-lg example">
                        <option disabled selected>Vyberte obrazok</option>
                        <option value="bussiness_man.jpg">Bussinessman</option>
                        <option value="stonks.jpg">Stonks</option>
                        <option value="poznamky.jpg">Poznamky</option>
                        <option value="house.jpg">House</option>
                    </select>

                <p><button type="submit" class="btn btn-outline-danger">Create</button>

                <p class="text-danger"><?php echo $message ?></p>
            </div>

        </form>
    </main>
</body>

</html>