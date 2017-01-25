<?php
    include("connect.php");  //includes my connection to my db
    include("error.php");  //includes my errorhandling form 
    
    $stmt = $db->query("SELECT * FROM blog_tbl;"); // this is my query that selects all form table
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches all 
    
    /*echo"<pre>";
    print_r($posts);
    echo"<pre>";
    */

    
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
            <section id="posts"> 
                 <?php foreach ($posts as $post): //for each loop that posts out all my posts ?>  
                <div id="maincontent">
                <h2><?= htmlentities($post['title']) //posts my title with html entities, htmlentities converts characters to HTML entities ?></h2>
                <p><?= htmlentities($post['content']) //posts my content with html entities in a p tag?></p>
                <h3>Author: <?= htmlentities($post['author'])//posts my author with html entities ?></h3>
                <h4>Posted on: <?= htmlentities($post['published_date']) //posts my date the post was created with html entities?></h4>
                </div>
                <?php endforeach; //ends my for each loop?>
            </section>
            <footer>
                <small>&copy; Made By Christophe Van Luyck</small>
            </footer>
        </div>
    </body>
    
</html>