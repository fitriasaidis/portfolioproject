<?php
    session_start();
?>

 <?php
    include("inc/connect.php");

    $username = $_SESSION["username"];

    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $status = $_POST['status'];

    $inputdate = strtotime(date('Y-m-d', strtotime($date) ) );
    $currentDate = strtotime(date('Y-m-d'));

    $sqlfind = "SELECT * FROM schedule WHERE date = '$date' AND start_time = '$start_time' AND end_time = '$end_time' AND tusername = '$username'";
    $resultcheck = $conn->query($sqlfind);

        //Check if date, start time and end time already added in database

        if($resultcheck->num_rows > 0) //Data already added in schedule db
        {
            echo "<script>
                        alert ('Data and time is already added.')
                    </script>";
            echo "<meta http-equiv=\"refresh\" content=\"1;URL=myavailability.php\">";
        }
        else // Data is not added in schedule db yet
        {
            //Check if date entered is less than today
            if($inputdate >= $currentDate)
            {
                $sqlt = "INSERT INTO schedule (date, start_time, end_time, status, tusername) VALUES ('$date','$start_time', '$end_time', '$status' ,'$username')" or die("Error inserting data into table");

                if($conn->query($sqlt) == TRUE) //Successfully added new schedule record
                {        
                    echo "<script>
                            alert('Successfully added new schedule');
                        </script>";
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=myavailability.php\">";             
                }
                else
                {
                    echo "<script>
                            alert('Fail to add new schedule');
                        </script>";
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=myavailability.php\">";   
                }
            }
            else
            {
                echo "<script>
                        alert('Date cannot be less than today.');
                    </script>";
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=writeSchedule.php\">";   
            }
        }
    $conn->close();
?>