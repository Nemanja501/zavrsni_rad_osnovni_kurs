<?php 
include "db.php";
if(isset($_POST['title']) && isset($_POST['body']) && isset($_POST['author'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_POST['author'];
    $sql = "INSERT INTO posts (title, body, author, created_at) values (?, ?, ?, CURRENT_DATE());";
    $statement = $connection->prepare($sql);
    $statement->execute([$title, $body, $author]);
    header("Location: posts.php");
    
}else{
    echo "Please fill out every field.";
}
?>