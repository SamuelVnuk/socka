<?php
require_once('articles/connection.php');
$isEmpty = false;

$title = mysqli_real_escape_string($conn, $_POST['Title']);
$text = mysqli_real_escape_string($conn, $_POST['Text']);
$author = mysqli_real_escape_string($conn, $_POST['Author']);
$img = mysqli_real_escape_string($conn, $_POST['Img']);

if(empty($title)){
    $isEmpty = true;
}
if(empty($text)){
    $isEmpty = true;
}
if(empty($author)){
    $isEmpty = true;
}

if($isEmpty == true){
    header('Location: articles/createArticle.php?message=Niečo nebolo zadané');
}

if($isEmpty == false){
    $sql = "INSERT INTO articles (Title, Text, Cover_image, Autor) 
    VALUES('$title', '$text', '$img', '$author')";
    if ($conn->query($sql) == true){       
        header('Location: articles/createArticle.php?message=Článok bol úspešne vytvorený');
    }
    else{
        echo "Error" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}