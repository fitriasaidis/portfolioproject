<?php
    session_start();
    include("inc/connect.php");

    $id = $_POST['scheduleId'];
    $date = $_POST['date'];
    $start_time = $_POST['starttime'];
    $end_time = $_POST['endtime'];
    $status = $_POST['status'];


    $sql = "UPDATE schedule SET date = '".$date."', start_time = '".$start_time."', end_time = '".$end_time."',  status = '".$status."' where scheduleId = '".$id."'";

    $result = $conn->query($sql);

    if ($conn->query($sql) == TRUE)
    {
        echo "<script>
                alert('Successfully updated schedule record');
            </script>";
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=myavailability.php\">";
    }
    else
    {
        echo "<script>
                alert('Fail to update schedule record');
            </script>";
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=myavailability.php\">";
    }
    $conn->close();

?>