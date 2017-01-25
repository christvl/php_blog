 <?php
    session_start();
    include("connect.php");
    include("error.php");


	if(isset($_POST['submit'])){
	$author = $_POST['author'];
	$title = $_POST['title'];
	$content = $_POST['content'];
    $error='';
    
    if(empty($author)){
           $error.= '<li>Please fill in a author</li>';
       }
    if(empty($title)){
           $error.='<li>Please fill in a title</li>';
       }
    if(empty($content)){
           $error.= '<li>Please fill in the content</li>';
       }
    if(empty($error)){
		$stmt = $db->prepare("
			INSERT INTO blog_tbl (author, title, content)
			VALUES (:author, :title, :content);
		");
		$stmt->bindValue(":author", $author);
		$stmt->bindValue(":title", $title);
		$stmt->bindValue(":content", $content);
		$stmt->execute();
        $_SESSION['error'] = "<p> Post Added Succesfully!! </p>";
    }
    else{
        $_SESSION['error'] = "<ul>" . $error . "</ul>";
    }
	header("Location: post.php");
}
?>