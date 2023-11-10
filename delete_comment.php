<?php 
include "db.php";
$id = $_GET['id'];
$sql = "DELETE FROM comments WHERE id=$id";
$statement = $connection->prepare($sql);
$statement->execute();

?>