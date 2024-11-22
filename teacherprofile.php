<?php
    session_start();
    include("headteacher.php");
    include ('inc/connect.php');
?>
<html>
<head>
    <title>Teacher Profile</title>
    <link rel="stylesheet" type="text/css" href="css/profile.css">
</head>

<body class = "profile">
    <section>
        <?php
            $username= $_SESSION['username'];

            $sql= "SELECT * FROM teacher where tusername='$username'";
            $result = $conn->query($sql);

            if($result->num_rows > 0)
            {
                //output data of each row
                while($row= $result->fetch_assoc())
                {
                    echo "<h3>MY PROFILE</h3><hr/><br>";
                    echo "<table>";
                    echo "<img width = '180px' height = '200px' src='data:image/jpg;charset=utf8;base64,"?><?php echo base64_encode($row['img']); ?><?php echo"' />";
                    echo "<p>";
                    echo "<p><a href = 'updateteacherprofile.php'><input type = 'button' value = 'UPDATE PROFILE'></a></p>";
                    echo "<tr><th>Username: </th><td>".$row['tusername']."</td></tr>";
                    echo "<tr><th>Name: </th><td>".$row['name']."</td></tr>";
                    echo "<tr><th>Email: </th><td>".$row['email']."</td></tr>";
                    echo "<tr><th>Phone No: </th><td>".$row['phone']."</td></tr>";
                    echo "<tr><th>Gender: </th><td>".$row['gender']."</td></tr>";
                    echo "<tr><th>Field: </th><td>".$row['field']."</td></tr>";
                }
                echo "</table>";
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