<?php
    session_start();
    include ("headstudent.php");
    include ("inc/connect.php");

    $username = $_SESSION["username"];

?>
<html>
<head>
    <title>Student Appointment</title>
    <link rel="stylesheet" type="text/css" href="css/teacherinformation.css">
</head>
<body class = "ti">
    <section>
        <form action = "" method="GET">
            <input type="text" name="query" placeholder = "Teacher's name">
            <input type = "submit" name = "submit" value = "SEARCH">
        </form>
    </section>
    <article>
        <?php
        if(isset($_GET['submit'])) // If student wants to view specific appointment
        {
            if($_GET["query"] != NULL) // If button search clicked with input
            {
                $query = $_GET['query']; 
                $sql = "SELECT appointment.scheduleId, appId, date, start_time, end_time, teacher.name AS teacher FROM appointment INNER JOIN schedule ON schedule.scheduleId = appointment.scheduleId INNER JOIN teacher ON teacher.tusername = schedule.tusername where appointment.susername = '$username' AND teacher.name LIKE '%".$query."%' ORDER BY date" or die("Error inserting data into table");
                $result = mysqli_query($conn, $sql);
                $i = 1;
                
                if($result->num_rows > 0)
                {
                    echo "<table>";
                    echo "<tr><th>NO</th><th>TEACHER NAME</th><th>DATE</th><th>START TIME</th>
                        <th>END TIME</th><th colspan=''<th>UPDATE</th></tr>";
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr>";
                        echo "<td width = '5%'>".$i++."</td>";
                        echo "<td>".$row['teacher']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['start_time']."</td>";
                        echo "<td>".$row['end_time']."</td>";
                        echo "<td><a href = 'deleteAppStudent.php?id=";?><?php echo $row['appId']; ?><?php echo ", &scheduleId=";?><?php echo $row['scheduleId'];?><?php echo "'><input type = 'button' value = 'CANCEL'></a></td>";
                        echo "</tr>";
                    }
                    echo "</table><br><br>";
                }
                else
                {
                    echo "<br>0 result<br><br>";
                }
            }
        }
        else
        {
            $sql = "SELECT appointment.scheduleId, appId, date, start_time, end_time, teacher.name AS teacher FROM appointment INNER JOIN schedule ON schedule.scheduleId = appointment.scheduleId INNER JOIN teacher ON teacher.tusername = schedule.tusername where appointment.susername = '$username' ORDER BY date" or die("Error inserting data into table");
            $result = mysqli_query($conn, $sql);
            $i = 1;
            if($result->num_rows > 0)
            {
                echo "<table>";
                echo "<tr><th>NO</th><th>TEACHER NAME</th><th>DATE</th><th>START TIME</th>
                    <th>END TIME</th><th colspan=''<th>UPDATE</th></tr>";
                while($row = $result->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td width = '5%'>".$i++."</td>";
                    echo "<td>".$row['teacher']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['start_time']."</td>";
                    echo "<td>".$row['end_time']."</td>";
                    echo "<td><a href = 'deleteAppStudent.php?id=";?><?php echo $row['appId']; ?><?php echo ", &scheduleId=";?><?php echo $row['scheduleId'];?><?php echo "'><input type = 'button' value = 'CANCEL'></a></td>";
                    echo "</tr>";
                }
                echo "</table><br><br>";
            }
            else
            {
                echo "<br>0 result<br><br>";
            }
        }
        $conn->close();
        ?>
    </article>
</body>
    <?php    
        include("footer.php");
    ?>
</html>