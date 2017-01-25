<?php
    session_start();
    include("connect.php");
    include("error.php");
    
    $stmt = $db->query("SELECT * FROM blog_tbl;");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </header>
            <section id="postList">
                <?php foreach ($posts as $post): ?>
                
                <div id="contentChange">
                <p id="numID"><?= htmlentities($post['id'])//posts my id  ?></p>
                <h2><?= htmlentities($post['title']) //posts my title ?></h2>
                <p><?= htmlentities($post['content']) //posts my content ?></p>
                <h3>Author: <?= htmlentities($post['author'])//posts my author  ?></h3>
                <h4>Posted on: <?= htmlentities($post['published_date']) //posts my date ?></h4>
                <a href="edit.php?id=<?php echo $post['id'] ?>">Edit</a> <!-- a link that puts my id in the url which i tried to get to change my fields -->
                <a href="delete.php?id=<?php echo $post['id'] ?>">Delete</a><!-- a link that puts my id in the url which i tried to get to delete  my fields -->
                </div>
                <?php endforeach;?>
            </section>
            <section id="newPost">
             <form method="POST" action="add.php">
                    <legend>Write a new post</legend>
                    <div class="error"><?php echo $_SESSION['error']; ?></div>
                    <input type="text" name="author" class="author" placeholder="Author"/><br>
                    <input type="text" name="title" class="title" placeholder="Title"/><br>
                    <textarea name="content" rows="20" cols="80" class="textA" placeholder="Write your post text here !"></textarea><br>
                    <input type ="submit" name="submit" value="Submit" class="submit"/>
                </form>
            </section>
            <footer>
                <small>&copy; Made By Christophe Van Luyck</small>
            </footer>
        </div>
    </body>
    
</html>