<?php
    include ("inc/connect.php");
    session_start();
    if (!isset($_SESSION['username']))
    {
        $_SESSION['username']=$_POST['username'];
        $_SESSION['pass']=$_POST['pass'];
    }

    //include ('inc/connect.php');

    $sqls = "SELECT * FROM student WHERE susername = '".$_SESSION['username']."' AND spass = '".$_SESSION['pass']."'";
    $sqlt = "SELECT * FROM teacher WHERE tusername = '".$_SESSION['username']."' AND tpass = '".$_SESSION['pass']."'";

    $resultstu = $conn->query($sqls);
    $resulttea = $conn->query($sqlt);

    if($resultstu->num_rows == 0 && $resulttea->num_rows == 0) //Could not find username and password in student and teacher database
    {
        echo "<script type='text/Javascript'>
                window.alert('Wrong username and password. Please try again.')
            </script>";
        session_unset();
        echo "<meta http-equiv=\"refresh\" content=\"1;URL=loginpage.php\">";
    }
    else if($resulttea->num_rows != 0) //Found username and password in teacher database
    {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=myavailability.php\">";
    }
    else //Found username and password in student database
    {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacherinformationstudent.php\">";
    }

    $conn->close();
?>