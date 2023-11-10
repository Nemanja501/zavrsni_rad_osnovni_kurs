<?php 
include "db.php";
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
</head>
<body>
    <button class="btn btn-default" id="hide-comments-btn">Hide Comments</button>
    <hr>
    <?php 
        $sql = "SELECT * FROM comments where comments.post_id =" . $_GET['id'];
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        $comments = $statement->fetchAll();  

        foreach($comments as $comment){
            echo "<li class='comment'>" . $comment['text'] . "<br> by: " . $comment['author']; 
            echo '<a href="delete_comment.php?id="'. $comment['id'] .'"><button class="btn btn-default" id="delete-comments-btn">Delete</button></a></li>';
            echo "<hr>";
        }?>
</body>
<script src="hide_comments.js"></script>