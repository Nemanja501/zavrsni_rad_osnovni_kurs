<?php 
include "db.php";
$id = $_GET['id'];
$postID = $_GET['post_id'];
$sql = "DELETE FROM comments WHERE id= :id";
$statement = $connection->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
header("Location: single_post.php?id=" . $postID);
?>