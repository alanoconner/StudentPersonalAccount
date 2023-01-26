<?php
    
    include('connToDB.php');  
    $username = $_POST['studid'];  
    $password = $_POST['psw'];  

    
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from userlogin where studentID = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);         
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";
            session_start();
            $_SESSION['pass'] = $password;
            $_SESSION['username'] = $username;

            header("Location: mainpage.php"); 
             
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  