<?php
    
    include('connToDB.php');
    include('login_scripts.php');
    $sql = "select * from student_card where studentID = " . $username . " ;";  


  
  $result = mysqli_query($connection, $sql);

  // Check if the query was successful
  if (!$result) {
      die("Query failed: " . mysqli_error($connection));
  }
  
  
  // Loop through the resulting rows and display the data
  while ($row = mysqli_fetch_array($result)) {
      echo "Name: " . $row["name"] . "<br>";
    
  }
  
  // Close the connection to the database
  mysqli_close($connection);
  
   $conn->close();
?>