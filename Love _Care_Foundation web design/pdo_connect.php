<?php
    $string = "mysql:dbname=loveandcare;host=localhost";
    $user = 'root';
    $password = '';
    try{
         $db = new PDO($string, $user, $password);
         
     }
     catch (PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
         die();
     }

?> 
