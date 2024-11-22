<?php
    session_start();
    include("headteacher.php");
    include ("inc/connect.php");
?>
<html>
    <head>
        <title>My Availability</title>
        <link rel="stylesheet" type="text/css" href="css/teacherinformation.css">
    </head>
    <body class = "ti">
        <section>
            <?php
            $username = $_SESSION["username"];

            $sql = "SELECT * FROM schedule where tusername = '$username' AND status = 'Available'";
            $result = mysqli_query($conn, $sql);

            echo "<center><h3>AFTER-CLASS SCHEDULE</h3><hr/></center>";
        
            ?>
            <br><p><a href = 'writeSchedule.php'>
                <input type = "submit" value = "NEW SCHEDULE">
            </a></p><?php
            
            echo "<table border = '1px' class = 'viewtb'>";
            echo "<tr>
                <th>NO</th>
                <th>DATE</th>
                <th>START TIME</th>
                <th>END TIME</th>
                <th>STATUS</th>
                <th colspan='2'>UPDATE</th>
                </tr>";
                    
            $i = 1;
            if ($result->num_rows>0) // There is schedule made by teacher found in db
            {
                while($row = mysqli_fetch_assoc($result)) 
                {
                    echo "<tr>
                            <td>".$i++."</td>
                            <td>".$row['date']."</td>
                            <td>".$row['start_time']."</td>
                            <td>".$row['end_time']."</td>
                            <td>".$row['status']."</td>                  

                            <td><a href='editSchedule.php?id= ".$row['scheduleId']."'>Edit</a></td>
                            <td><a href='deleteSchedule.php?id= ".$row['scheduleId']."'>Delete</a></td> 
                        </tr>";
                }   
            }         
            echo "</table><br><br>";  
            $conn->close();  
            ?>
        </section>
        <?php 
            include("footer.php");
        ?>
    </body>
</html>