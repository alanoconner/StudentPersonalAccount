<?php


 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "a2212501";
 $db = "campusplan";
 $con = mysqli_connect($dbhost, $dbuser, $dbpass, $db);  
 mysqli_set_charset($con,"utf8");
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>
 
 
 
 
