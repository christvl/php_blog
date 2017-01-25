<?php
    session_start();
    include("connect.php");
    include("error.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $stmt = $db->query("SELECT * FROM blog_tbl
                            WHERE id= $id");
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>welcome to my blog!</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
    </head>
    
    <body>
        <div id="wrapper">
            <header>
                <h1><a href="index.php" id="fronttext">The Stormwind Post</a></h1>
                <ul>
                    <li><a href="post.php">Admin</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </header>
            <section id="newPost">
             <form method="POST" action="update.php?id=<?php echo $post['id'] ?>">
                    <legend>Edit your post</legend>
                    <input type="hidden" value="<?= htmlentities($post['id'])?>"><br>
                    <input type="text" name="author" class="author" value="<?= htmlentities($post['author'])?>"/><br>
                    <input type="text" name="title" class="title" value="<?= htmlentities($post['title'])?>"/><br>
                    <textarea name="content" rows="20" cols="80" class="textA" ><?= htmlentities($post['content'])?></textarea><br>
                    <input type ="submit" name="submit" value="Submit" class="submit" />
                </form>
            </section>
            <footer>
                <small>&copy; Made By Christophe Van Luyck</small>
            </footer>
        </div>
    </body>
</html>