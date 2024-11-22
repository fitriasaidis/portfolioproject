<?php
    session_start();

    include("headstudent.php");
    include("inc/connect.php");

    $appId = $_GET['id'];
    $scheduleId = $_GET['scheduleId'];

    $sql = "DELETE from appointment WHERE appId = '$appId'";

    if ($conn->query($sql) == TRUE)
    {
        $sqlupdate = "UPDATE schedule SET status = 'Available' where scheduleId = '$scheduleId'";
        
        if ($conn->query($sqlupdate) == TRUE)
        {
            echo "<script type='text/Javascript'>
                        window.alert('Successfully cancel appointment')
                    </script>";
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=studentappointment.php\">";
        }
        else
        {
            echo "<script type='text/Javascript'>
                        window.alert('Fail to cancel student's appointment')
                    </script>";
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=studentappointment.php\">";
        }
    }
    else
    {
        echo "<script type='text/Javascript'>
                        window.alert('Fail to cancel student's appointment')
                    </script>";
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=studentappointment.php\">";
    }
    $conn->close();

    include("footer.php");
?>

