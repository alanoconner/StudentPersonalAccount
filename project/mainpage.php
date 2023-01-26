<?php
session_start();
$psw = $_SESSION['pass'];
$usern = $_SESSION['username'];


include('connToDB.php');

$sql = "select * from student_card where studentID = " . $usern . " ;";  

$result = mysqli_query($con, $sql);

// Check if the query was successful
if (!$result) {
  die("Query failed: " . mysqli_error($con));
}


// Loop through the resulting rows and display the data
while ($row = mysqli_fetch_array($result)) {
  //echo "Name: " . $row["name"] . "<br>";

    $_name = $row["name"];
    $_stuid = $row["studentID"];
    $_fname = $row["family_name"];
    $_facult = $row["faculty"];
    $_acyear= $row["academic_year"];
    $_email = $row["email"];

}

// Close the connection to the database
//mysqli_close($con);

//looping for subjects

$schedule_sql = "select * from my_schedule;";
$schedule_res = mysqli_query($con, $schedule_sql);
if (!$schedule_res) {
    die("Query failed: " . mysqli_error($con));
}

$s = array();
$i = 0;
while($row = mysqli_fetch_array($schedule_res)){
    $s[$i]["m"] = $row["m"];
    $s[$i]["tu"] = $row["tu"];
    $s[$i]["w"] = $row["w"];
    $s[$i]["th"] = $row["th"];
    $s[$i]["f"] = $row["f"];
    $i++;
}
 

$con->close();

//displaying todays schedule
function today() {
    $td = date('l');
    switch ($td){
        case 1:
            return "m";
            
        case 2:
            return "tu";
            
        case 3:
            return "w";
            
        case 4:
            return "th";
           
        case 5:
            return "f";
        default:
            return "m";
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "./styles.css">
    <title>Campus Plan</title>
</head>
<body>
    <header>
        <h2>Campus Plan</h2>

    </header>

    <div class ="personalInfo">

        <div class = "personalData">

        <p>Name: &nbsp;&nbsp;  <span class="varLeftAlign"> <?php echo $_name . $_fname; ?> </span></p>
<p>Student Number: &nbsp;&nbsp; <span class="varLeftAlign"> <?php echo $_stuid; ?> </span></p>
<p>Faculty: &nbsp;&nbsp; <span class="varLeftAlign"> <?php echo $_facult; ?> </span></p>
<p>Year: &nbsp;&nbsp; <span class="varLeftAlign"> <?php echo $_acyear; ?> </span></p>
<p>E-mail: &nbsp;&nbsp; <span class="varLeftAlign"> <?php echo $_email; ?> </span></p>


        </div>

        <img src = "pictures/profile.webp">

    </div>

    <div class = "schedule-menu">
        <div class ="menu">
            
            <table>
                
                <tr>
                    <td>
                        
                        
                        <a href="#schedule" class = "link-underline">時間割</a>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href = "#calendar" class = "link-underline">カレンダー</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        <a href="#bus" class = "link-underline">スクールバス</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        <a href="#jikanwari" class = "link-underline">履修状況表示</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        <a href = "./shinsei.html" class = "link-underline">Web履修申請</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class = "schedule" id = "schedule">
            
            <table class="schedule-today">
                <tr>
                    
                    <th colspan="2">Schedule </th>
                    
                </tr>
                <tr>
                    <td>1</td>
                    <td> 
                        <button type="button">
                        <h4><?php echo isset($s[0][today()]) ? $s[0][today()] : ''; ?></h4>
                            <p class = "time">8:50 ~ 10:20</p>
                            <p class = "teacher-name">荒平高章</p>
                        </button>
                    </td>    
                </tr>
                <tr>
                    <td>2</td>
                    <td> 
                        <button type="button">
                        <h4><?php echo isset($s[1][today()]) ? $s[1][today()] : ''; ?></h4>
                            <p class = "time">10:30 ~ 12:00</p>
                            <p class = "teacher-name">-</p>
                        </button>
                    </td>     
                </tr>
                <tr>
                    <td>3</td>
                    <td> 
                        <button type="button">
                        <h4><?php echo isset($s[2][today()]) ? $s[2][today()] : ''; ?></h4>
                            <p class = "time">12:50 ~ 14:20</p>
                            <p class = "teacher-name">荒平高章</p>
                        </button>
                    </td>   
                </tr>
                <tr>
                    <td>4</td>
                    <td> 
                        <button type="button">
                        <h4><?php echo isset($s[3][today()]) ? $s[3][today()] : ''; ?></h4>
                            <p class = "time">14:30 ~ 16:00</p>
                            <p class = "teacher-name">荒平高章</p>
                        </button>
                    </td>     
                </tr>
                <tr>
                    <td>5</td>
                    <td> 
                        <button type="button">
                        <h4><?php echo isset($s[4][today()]) ? $s[4][today()] : ''; ?></h4>
                            <p class = "time">16:10 ~ 17:40</p>
                            <p class = "teacher-name">荒平高章</p>
                        </button>
                    </td>     
                </tr>

            </table>
        </div>
    </div>

    <div class = "calendar" id = "calendar">
        <!--h4>Calendar</h4-->
        <iframe src="https://embed.styledcalendar.com/#m6H2VtIujQ2hxkJ5c3Th" title="Styled Calendar" class="styled-calendar-container" style="width: 100%; border: none;" data-cy="calendar-embed-iframe"></iframe>
        <script async type="module" src="https://embed.styledcalendar.com/assets/parent-window.js"></script>    </div>

    <div class="bus-jikanwari">
        <div class = "bus" id = "bus">
            <table>
                <tr>
                    
                    <th colspan="2">School Bus</th>
                </tr>
                <tr>
                    <td>8</td>
                    <td>30 50</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>20 30 50</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>35</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>15 20 40 55</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>30 50</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>05 20 50</td>
                </tr>

            </table>
        </div>
        <div class = "jikanwari" id = "jikanwari">
            <table>
                <tr>
                    <th style ="width: 8%;"> </th>
                    <th style ="width: 18.4%;">Mon</th>
                    <th style ="width: 18.4%;">Tue</th>
                    <th style ="width: 18.4%;">Wed</th>
                    <th style ="width: 18.4%;">Thu</th>
                    <th style ="width: 18.4%;">Fri</th>
                </tr>
                <tr>
    <td>&nbsp; 1 &nbsp;</td>
    <td><?php echo isset($s[0]["m"]) ? $s[0]["m"] : ""; ?></td>
    <td><?php echo isset($s[0]["tu"]) ? $s[0]["tu"] : ""; ?></td>
    <td><?php echo isset($s[0]["w"]) ? $s[0]["w"] : ""; ?></td>
    <td><?php echo isset($s[0]["th"]) ? $s[0]["th"] : ""; ?></td>
    <td><?php echo isset($s[0]["f"]) ? $s[0]["f"] : ""; ?></td>
</tr>
<tr>
    <td> 2</td>
    <td><?php echo isset($s[1]["m"]) ? $s[1]["m"] : ""; ?></td>
    <td><?php echo isset($s[1]["tu"]) ? $s[1]["tu"] : ""; ?></td>
    <td><?php echo isset($s[1]["w"]) ? $s[1]["w"] : ""; ?></td>
    <td><?php echo isset($s[1]["th"]) ? $s[1]["th"] : ""; ?></td>
    <td><?php echo isset($s[1]["f"]) ? $s[1]["f"] : ""; ?></td>
</tr>
<tr>
    <td>3</td>
    <td><?php echo isset($s[2]["m"]) ? $s[2]["m"] : ""; ?></td>
    <td><?php echo isset($s[2]["tu"]) ? $s[2]["tu"] : ""; ?></td>
    <td><?php echo isset($s[2]["w"]) ? $s[2]["w"] : ""; ?></td>
    <td><?php echo isset($s[2]["th"]) ? $s[2]["th"] : ""; ?></td>
    <td><?php echo isset($s[2]["f"]) ? $s[2]["f"] : ""; ?></td>
</tr>
<tr>
    <td>4</td>
    <td><?php echo isset($s[3]["m"]) ? $s[3]["m"] : ""; ?></td>
    <td><?php echo isset($s[3]["tu"]) ? $s[3]["tu"] : ""; ?></td>
    <td><?php echo isset($s[3]["w"]) ? $s[3]["w"] : ""; ?></td>
    <td><?php echo isset($s[3]["th"]) ? $s[3]["th"] : ""; ?></td>
    <td><?php echo isset($s[3]["f"]) ? $s[3]["f"] : ""; ?></td>

<tr>
    <td>5</td>
    <td><?php echo isset($s[4]["m"]) ? $s[4]["m"] : ""; ?></td>
    <td><?php echo isset($s[4]["tu"]) ? $s[4]["tu"] : ""; ?></td>
    <td><?php echo isset($s[4]["w"]) ? $s[4]["w"] : ""; ?></td>
    <td><?php echo isset($s[4]["th"]) ? $s[4]["th"] : ""; ?></td>
    <td><?php echo isset($s[4]["f"]) ? $s[4]["f"] : ""; ?></td>
</tr>

</table>
</div>
</div>
</body>


<footer>
  <div class="container">
    <p>Copyright ©2022 大学</p>
  </div>
</footer>

</html>