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
    <link href="styles/styles.css" type="text/css" rel="stylesheet">
</head>

<body>
    <header>
        <?php include "header.php";?>
        <div class="blog-header">
            <div class="container">
                <h1 class="blog-title">The Bootstrap Blog</h1>
                <p class="lead blog-description">An example blog template built with Bootstrap.</p>
            </div>
        </div>
    </header>

    <main role="main" class="container">

    <?php 
    $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 3";
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    $posts = $statement->fetchAll();
    ?>

        <div class="row">
            <div class="col-sm-8 blog-main">
                <?php foreach($posts as $post){ ?>
                <div class="blog-post">
                    <?php echo "<a href='single_post.php?id=" . $post['id']. "'>"?><h2 class="blog-post-title"><?php echo $post['title']; ?></h2></a>
                    <p class="blog-post-meta"><?php echo $post['created_at']; ?> by <a href="#"><?php echo $post['author']; ?></a></p>

                    <p> <?php echo $post['body']; ?></p>
                </div><!-- /.blog-post -->
                <?php }?>

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                </nav>

            </div><!-- /.blog-main -->
            <?php include "sidebar.php"; ?>
        </div><!-- /.row -->

    </main><!-- /.container -->
    <?php include "footer.php"; ?>
</body>
</html>