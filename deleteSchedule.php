<?php
    session_start();

    include("inc/connect.php");

    $sql = "DELETE FROM schedule WHERE scheduleId = '" . $_GET['id'] . "'";
    
    if ($conn->query($sql) == TRUE)
    {
        echo "<script>
                window.alert('Schedule has been deleted')
            </script>";  
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=myavailability.php\">";
    }
    else
    {
        echo "<script>
                window.alert('Schedule cannot been deleted')
            </script>";  
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=myavailability.php\">";
    }
    
    $conn->close();

?>

