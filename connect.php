<?php
    $dns = 'mysql:host=localhost;dbname=blog_db;charset=utf8'; 
    //use the 3 arguments to connect to my database
    $user ="root"; //makes a variable out of my username
    $password =""; //makes a var out of my password
    
    $db = new PDO($dns, $user, $password); //making pdo connection
    $db->exec("set names UTF8"); //sets it to UTF 8
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //ERROR handling

?>