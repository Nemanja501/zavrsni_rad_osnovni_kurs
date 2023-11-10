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
    <?php 
    include "header.php";
   
    $sql = "SELECT * FROM posts where posts.id =" . $_GET['id'];
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    $post = $statement->fetch();
    ?>
    <main role="main" class="container">
        <div class="row">

            <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
                    <p class="blog-post-meta"><?php echo $post['created_at']; ?> by <a href="#"><?php echo $post['author']; ?></a></p>

                    <p> <?php echo $post['body']; ?></p>
                    <form action="create_comment.php" method="post">
                        <label>Your name: </label><br>
                        <input type="text" name="author" required><br><br>
                        <label>Comment: </label><br>
                        <input type="text" name="comment" required><br><br>
                        <input type="hidden" name="post-id" value="<?php echo $post['id']?>">
                        <input type="submit" name="submit" value="Submit" class="btn btn-default">
                    </form>
                    <br>
                    <ul>
                        <?php include "comments.php";?>
                    </ul>
                </div><!-- /.blog-post -->

                </div><!-- /.blog-main -->
            <?php include "sidebar.php"; ?>
        </div><!-- /.row -->

    </main><!-- /.container -->
    <?php include "footer.php"; ?>
</body>