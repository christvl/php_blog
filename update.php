<?php
session_start();
    include("connect.php");
    include("error.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $author=$_POST['author'];
        $title=$_POST['title'];
        $content=$_POST['content'];
        
        $error='';
    
    if(empty($author)){
           $error.= '<li>Please fill in a author</li>';
       }
    if(empty($title)){
           $error.= '<li>Please fill in a title</li>';
       }
    if(empty($content)){
           $error.= '<li>Please fill in the content</li>';
       }
    if(empty($error)){
        $stmt = $db->prepare("UPDATE blog_tbl
                            SET author=:author, title=:title, content=:content
                            WHERE id= $id");
        $stmt->bindValue(":author", $author);
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":content",$content);
        $stmt->execute();
         $_SESSION['error'] = "<p> Post edited </p>";
        
    }
    else{
        $_SESSION['error'] = "<ul>" . $error . "</ul>";
    }
      header("Location: post.php");
    }
?>