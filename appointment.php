<?php
    session_start();
    if (!isset($_SESSION['username']))
    {
        //Destroy the whole session
        $_SESSION = array();
        session_destroy();
    }
    else
    {
        include ("inc/connect.php");

        $username = $_SESSION["username"];
        $scheduleid = $_GET["id"];

        $sql = "INSERT INTO appointment(scheduleid, susername) values('$scheduleid', '$username')";
        if($conn->query($sql) == TRUE)
        {
            $sqlu = "UPDATE schedule SET status = 'Not Available' WHERE scheduleId = '$scheduleid'";
            if($conn->query($sqlu) == TRUE)
            {
                echo "<script type='text/Javascript'>
                        window.alert('Successfully added new appointment for $username')
                    </script>";
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacheravailabilitystudent.php\">";
            }
            else
            {
                echo "<script type='text/Javascript'>
                        window.alert('Fail to update teacher's status schedule')
                    </script>";
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacheravailabilitystudent.php\">";
            }
        }
        else
        {
            echo "<script type='text/Javascript'>
                        window.alert('Fail to add new appointment for $username')
                    </script>";
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacheravailabilitystudent.php\">";
        }

        $conn->close();
    }
?>
