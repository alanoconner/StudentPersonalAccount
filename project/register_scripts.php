<?php      
    include('connToDB.php');  

    $name = $_POST['name'];
    $famname = $_POST['famname'];
    $login = $_POST['login'];
    $stuid = $_POST['stuid'];
    $faculty = $_POST['faculty'];
    $year= $_POST['year'];
    $email = $_POST['email'];
    $psw = $_POST['psw2'];

    $sql1 = "insert into userlogin values ('$login', '$stuid', '$email', '$psw');";  
    $sql2 = "insert into student_card values ($stuid, '$name', '$famname', '$faculty', $year, '$email');";  
    

    if ($con->query($sql1) === TRUE) {
        if ($con->query($sql2) === TRUE) {
            header("Location: login.html"); 
        } else {
            echo "Error: " . $sql . "<br>";
        }
          
    } else {
        echo "Error: " . $sql1 . "<br>";
    }


      
    $con->close();
  
?>  