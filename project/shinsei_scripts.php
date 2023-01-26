<?php

include('connToDB.php');

$m1 = mb_convert_encoding($_POST['lesson'], "UTF-8", "auto");
$tu1 = mb_convert_encoding($_POST['lesson1'], "UTF-8", "auto");
$w1 = mb_convert_encoding($_POST['lesson2'], "UTF-8", "auto");
$th1 = mb_convert_encoding($_POST['lesson3'], "UTF-8", "auto");
$f1 = mb_convert_encoding($_POST['lesson4'], "UTF-8", "auto");

$m2 = mb_convert_encoding($_POST['lesson5'], "UTF-8", "auto");
$tu2 = mb_convert_encoding($_POST['lesson6'], "UTF-8", "auto");
$w2= mb_convert_encoding($_POST['lesson7'], "UTF-8", "auto");
$th2 = mb_convert_encoding($_POST['lesson8'], "UTF-8", "auto");
$f2 = mb_convert_encoding($_POST['lesson10'], "UTF-8", "auto");

$m3 = mb_convert_encoding($_POST['lesson11'], "UTF-8", "auto");
$tu3 = mb_convert_encoding($_POST['lesson12'], "UTF-8", "auto");
$w3 = mb_convert_encoding($_POST['lesson13'], "UTF-8", "auto");
$th3 = mb_convert_encoding($_POST['lesson14'], "UTF-8", "auto");
$f3 = mb_convert_encoding($_POST['lesson15'], "UTF-8", "auto");

$m4 = mb_convert_encoding($_POST['lesson16'], "UTF-8", "auto");
$tu4 = mb_convert_encoding($_POST['lesson17'], "UTF-8", "auto");
$w4 = mb_convert_encoding($_POST['lesson18'], "UTF-8", "auto");
$th4 = mb_convert_encoding($_POST['lesson19'], "UTF-8", "auto");
$f4 = mb_convert_encoding($_POST['lesson20'], "UTF-8", "auto");

$m5 = mb_convert_encoding($_POST['lesson21'], "UTF-8", "auto");
$tu5 = mb_convert_encoding($_POST['lesson22'], "UTF-8", "auto");
$w5 = mb_convert_encoding($_POST['lesson23'], "UTF-8", "auto");
$th5 = mb_convert_encoding($_POST['lesson24'], "UTF-8", "auto");
$f5 = mb_convert_encoding($_POST['lesson25'], "UTF-8", "auto");




$sql_my = "INSERT INTO my_schedule VALUES ('$m1','$tu1','$w1','$th1','$f1')";
$sql_my1 = "INSERT INTO my_schedule VALUES ('$m2','$tu2','$w2','$th2','$f2')";
$sql_my2 = "INSERT INTO my_schedule VALUES ('$m3','$tu3','$w3','$th3','$f3')";
$sql_my3 = "INSERT INTO my_schedule VALUES ('$m4','$tu4','$w4','$th4','$f4')";
$sql_my4 = "INSERT INTO my_schedule VALUES ('$m5','$tu5','$w5','$th5','$f5')";



if (mysqli_query($con, $sql_my)) {
    echo "New record created successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
if (mysqli_query($con, $sql_my1)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
if (mysqli_query($con, $sql_my2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
if (mysqli_query($con, $sql_my3)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
if (mysqli_query($con, $sql_my4)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
header("Location: mainpage.php"); 


mysqli_close($con);
?>