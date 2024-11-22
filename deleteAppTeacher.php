<?php
    session_start();

    include("headteacher.php");
    include("inc/connect.php");

    $sql = "DELETE from appointment WHERE appId = " . $_GET['id'];

    $result = $conn->query($sql);

    if ($result == TRUE)
    {
        echo "<script type='text/JavaScript'>
                alert('Appointment has been Deleted!')
                </script>";
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacherappointment.php\">";
       
    }
    else
    {
        echo "<script type='text/JavaScript'>
                alert('Appointment cannot deleted!')
                </script>";
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacherappointment.php\">";
    }
    $conn->close();

    include("footer.php");
?>

