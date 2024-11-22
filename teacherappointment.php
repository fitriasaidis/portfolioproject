<?php
session_start();
include ("headteacher.php");
include ("inc/connect.php");

$username = $_SESSION["username"];

?>
<html>
    <head>
        <title>Teacher Appointment</title>
        <link rel="stylesheet" type="text/css" href="css/teacherappointment.css">
    </head>
    <body>
        <section class = "tapp">
            <form action = "" method="GET">
                <input type="text" name="query" placeholder = "Student's name">
                <input type = "submit" name = "submit" value = "SEARCH">
            </form>
            <br>
        </section>
        <article class = "viewapp">
            <h3>Upcoming Appointments</h3>
            <hr/><br>
            <a href = "generatepdf.php" target="_blank">
                <input type = "submit" value = "Download PDF"></a>
            <br><br>
            <?php
            if(isset($_GET['submit'])) // If teacher wants to view specific appointment
            {
                if($_GET["query"] != NULL) // If button search clicked with input
                {
                    $query = $_GET['query']; 
                    $sql= "SELECT schedule.scheduleId, appId, date, start_time, end_time, student.name AS student FROM appointment INNER JOIN schedule ON schedule.scheduleId = appointment.scheduleId INNER JOIN student ON student.susername = appointment.susername where schedule.tusername = '$username' AND date >= CURDATE() AND student.name LIKE '%".$query."%'";
                    $result = mysqli_query($conn, $sql);
                    $i = 1;

                        if ($result->num_rows>0)
                        {
                            echo "<table>";
                            echo "<tr><th>NO</th><th>STUDENT NAME</th><th>DATE</th><th>START TIME</th>
                                <th>END TIME</th><th colspan=''<th>Update</th></tr>";

                            while($row= $result->fetch_assoc())
                            {
                                echo "<tr>";
                                echo "<td>".$i++."</td>";
                                echo "<td>".$row['student']."</td>";
                                echo "<td>".$row['date']."</td>";
                                echo "<td>".$row['start_time']."</td>";
                                echo "<td>".$row['end_time']."</td>";
                                ?>
                                <td align="center"><a href="deleteAppTeacher.php?id=<?php echo $row["appId"]; ?>&scheduleId=<?php echo $row["scheduleId"]; ?>">CANCEL</a></td>
                                <?php
                                echo "</tr>";
                            }
                            echo "</table><br><br>";
                        }
                        else
                        {
                            echo "<br><br>0 result<br><br>";
                        }
                }
            }
            else //Display all teacher
            {
                $sql= "SELECT schedule.scheduleId, appId, date, start_time, end_time, student.name AS student FROM appointment INNER JOIN schedule ON schedule.scheduleId = appointment.scheduleId INNER JOIN student ON student.susername = appointment.susername where schedule.tusername = '$username' AND date >= CURDATE() ";
                $result = mysqli_query($conn, $sql);
                $i = 1;

                if ($result->num_rows>0)
                {
                    echo "<table>";
                    echo "<tr><th>NO</th><th>STUDENT NAME</th><th>DATE</th><th>START TIME</th>
                        <th>END TIME</th><th colspan=''<th>Update</th></tr>";

                    while($row= $result->fetch_assoc())
                    {
                        echo "<tr>";
                        echo "<td>".$i++."</td>";
                        echo "<td>".$row['student']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['start_time']."</td>";
                        echo "<td>".$row['end_time']."</td>";
                        ?>
                        <td align="center"><a href="deleteAppTeacher.php?id=<?php echo $row["appId"]; ?>&scheduleId=<?php echo $row["scheduleId"]; ?>">CANCEL</a></td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</table><br><br>";
                }
                else
                {
                    echo "<br><br>0 result<br><br>";
                }
            }
            ?>
        </article>
        <aside class = "viewtotal">
            <table>
                <tr>
                    <th>Appointment Today</th>
                </tr>
                <tr>
                    <td>
                        <?php
                        $sql= "SELECT COUNT(date) as date FROM schedule INNER JOIN appointment ON appointment.scheduleId = schedule.scheduleId where schedule.tusername = '$username' AND date = CURDATE()";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) //Teacher has appointment for today
                        {
                            while($row = $result->fetch_assoc())
                            {
                                echo $row["date"];
                            }
                        }
                        else //Teacher does not has appointment for today
                        {
                            echo "No appointment for today";
                        }
                        ?>
                    </td>   
                </tr>
            </table>
            <table>
                <tr>
                    <th>Appointment This Month</th>
                </tr>
                <tr>
                    <td>
                        <?php
                        $sql = "SELECT COUNT(date) as date FROM schedule INNER JOIN appointment ON appointment.scheduleId = schedule.scheduleId where schedule.tusername = '$username' AND MONTH(date) = MONTH(now())";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) //Teacher has appointment for this month
                        {
                            while($row = $result->fetch_assoc())
                            {
                                echo $row["date"];
                            }
                        }
                        else //Teacher does not has appointment for this month
                        {
                            echo "No appointment for this month";
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </aside>

    <?php
        $conn->close();
        include("footer.php");
    ?>

    </body>
</html>