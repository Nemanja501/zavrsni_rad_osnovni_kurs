<?php
include "db.php";
if(isset($_POST['author']) && isset($_POST['comment']) && isset($_POST['post-id'])){
    $author = $_POST['author'];
    $text = $_POST['comment'];
    $postID = $_POST['post-id'];
    $sql = "INSERT INTO comments (author, text, post_id) values (?, ?, ?);";
    $statement = $connection->prepare($sql);
    $statement->execute([$author, $text, $postID]);
    header("Location: single_post.php?id=" . $postID);
    
}else{
    echo "Error";
}



?>