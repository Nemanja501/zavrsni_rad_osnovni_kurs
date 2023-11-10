<?php
include "db.php";
$id = $_GET['id'];
$sql = "DELETE FROM comments WHERE post_id= :id";
$statement = $connection->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();

$sql2 = "DELETE FROM posts WHERE id= :id";
$statement2 = $connection->prepare($sql2);
$statement2->bindParam(':id', $id, PDO::PARAM_INT);
$statement2->execute();
header("Location: posts.php");
?>