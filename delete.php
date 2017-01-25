<?php
    include("connect.php");
    include("error.php");


    if (isset($_GET['id']) && is_numeric($_GET['id'])) { //gets my id and checks that a variable is a or numric string
        $id = $_GET['id']; // makes an variable thats the id 

        if (!empty($id)) {          //checks my id my is not empty
        try {
            $stmt = $db->prepare("
			DELETE FROM blog_tbl
			WHERE id=:id
		");  //delets my id and puts a placeholder on my id 
            $stmt->bindValue(":id", $id); //binds my placeholder with my variable
            $stmt->execute();
        } catch (Exception $exc) {   //error handler that catch the mistake is one is made 
            die($exc->getMessage());
        }
    }
}
header("Location: post.php"); //goes back the page post.php after it ran the process
?>
