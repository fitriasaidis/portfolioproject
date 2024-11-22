<?php
    session_start();

    include("headteacher.php");
    include("inc/connect.php");
?>
<html>
    <head>
        <title>Edit Schedule</title>
        <link rel="stylesheet" type="text/css" href="css/teacherinformation.css">
    </head>
</body>
    <section class = "ti">
        <?php
        $sql = "SELECT * FROM schedule where scheduleId = ". $_GET['id']; //scheduleId
        $result = $conn->query($sql);


        if ($result->num_rows > 0)
        {
            //output data of each row

            while($row = $result->fetch_assoc())
            {
                echo "<center><h3>TEACHER'S AFTER-CLASS SCHEDULE</h3></center>";
                echo "<table width = '30%'>";
                echo "<form method = 'POST' action = 'updateSchedule.php'";
                echo "<tr><th>SCHEDULE ID</th><td><input type = 'text' name = 'scheduleId' value = '".$row['scheduleId']."' readonly></td></tr>";
                echo "<tr><th>Date</th><td><input type = 'date' name = 'date' value = '".$row['date']."'></td></tr>";
                echo "<tr><th>Start Time</th><td><input type = 'time' name = 'starttime' value = '".$row['start_time']."'></td></tr>";
                echo "<tr><th>End Time</th><td><input type = 'time' name = 'endtime' value = '".$row['end_time']."'></td></tr>";
                echo "<tr><th>Status</th><td><input type = 'text' name = 'status' value='".$row['status']."' readonly></td></tr>";

                echo "<tr><td colspan = '2'><input type = 'submit' name = 'submit' value = 'UPDATE'>";
            }
            echo "</table></form>";
        }
        else
        {
            echo "0 result";
        }
        $conn->close();

        ?>
   </section>
<?php
include("footer.php");
?>
</body>
</html>