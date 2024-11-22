<?php
    session_start();
    include("headstudent.php");
    include ('inc/connect.php');
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Student Profile</title>
</head>

<body class = "updateprofile">
    <section>
        <?php
        $username= $_SESSION['username'];

        $sql = "SELECT * FROM student where susername = '$username'";
        $result = $conn->query($sql);

        if($result->num_rows>0){

            while($row = $result->fetch_assoc())
            {
                echo"<center><h3>YOUR PROFILE</h3></center><hr/>";
                echo"<form method='post' action='updatestudentfinal.php' enctype = 'multipart/form-data'>";
                echo "<center>";
                echo "<img width = '160px' height = '200px' src='data:image/jpg;charset=utf8;base64,"?><?php echo base64_encode($row['img']); ?><?php echo"' />";
                echo "<p>";
                ?>
                <p><input type="file" id = "img" name="img"></p>
                <?php
                echo "<table align='center'>";
                echo "<p>";
                echo "<tr><th>Username: </th><td>".$row['susername']."</td></tr>";
                echo "<tr><th>Name: </th><td><input type='text' name='u_name' value='".$row['name']."'></td></tr>";
                echo "<tr><th>Email: </th><td><input type='text' name='u_email' value='".$row['email']."'></td></tr>";
                echo "<tr><th>Phone No: </th><td><input type='text' name='u_phone' value='".$row['phone']."'></td></tr>";
                echo "<tr><th>Class: </th>";

                $class = $row['class'];
                switch($row['class'])
                {
                    case ($class = "3 Ibnu Abbas"):
                        echo "<td><select name = 'class'>";
                        echo "<option value = '3 Ibnu Abbas' selected>3 Ibnu Abbas</option>";
                        echo "<option value = '3 Ibnu Khaldun'>3 Ibnu Khaldun</option>";
                        echo "<option value = '3 Ibnu Majah'>3 Ibnu Majah</option>";
                        echo "<option value = '4 Ibnu Abbas'>4 Ibnu Abbas</option>";
                        echo "<option value = '4 Ibnu Khaldun'>4 Ibnu Khaldun</option>";
                        echo "<option value = '4 Ibnu Majah'>4 Ibnu Majah</option>";
                        echo "<option value = '5 Ibnu Abbas'>5 Ibnu Abbas</option>";
                        echo "<option value = '5 Ibnu Khaldun'>5 Ibnu Khaldun</option>";
                        echo "<option value = '5 Ibnu Majah'>5 Ibnu Majah</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($class = "3 Ibnu Khaldun"):
                        echo "<td><select name = 'class'>";
                        echo "<option value = '3 Ibnu Abbas'>3 Ibnu Abbas</option>";
                        echo "<option value = '3 Ibnu Khaldun' selected>3 Ibnu Khaldun</option>";
                        echo "<option value = '3 Ibnu Majah'>3 Ibnu Majah</option>";
                        echo "<option value = '4 Ibnu Abbas'>4 Ibnu Abbas</option>";
                        echo "<option value = '4 Ibnu Khaldun'>4 Ibnu Khaldun</option>";
                        echo "<option value = '4 Ibnu Majah'>4 Ibnu Majah</option>";
                        echo "<option value = '5 Ibnu Abbas'>5 Ibnu Abbas</option>";
                        echo "<option value = '5 Ibnu Khaldun'>5 Ibnu Khaldun</option>";
                        echo "<option value = '5 Ibnu Majah'>5 Ibnu Majah</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($class = "4 Ibnu Abbas"):
                        echo "<td><select name = 'class'>";
                        echo "<option value = '3 Ibnu Abbas'>3 Ibnu Abbas</option>";
                        echo "<option value = '3 Ibnu Khaldun'>3 Ibnu Khaldun</option>";
                        echo "<option value = '3 Ibnu Majah'>3 Ibnu Majah</option>";
                        echo "<option value = '4 Ibnu Abbas' selected>4 Ibnu Abbas</option>";
                        echo "<option value = '4 Ibnu Khaldun'>4 Ibnu Khaldun</option>";
                        echo "<option value = '4 Ibnu Majah'>4 Ibnu Majah</option>";
                        echo "<option value = '5 Ibnu Abbas'>5 Ibnu Abbas</option>";
                        echo "<option value = '5 Ibnu Khaldun'>5 Ibnu Khaldun</option>";
                        echo "<option value = '5 Ibnu Majah'>5 Ibnu Majah</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($class = "4 Ibnu Khaldun"):
                        echo "<td><select name = 'class'>";
                        echo "<option value = '3 Ibnu Abbas'>3 Ibnu Abbas</option>";
                        echo "<option value = '3 Ibnu Khaldun'>3 Ibnu Khaldun</option>";
                        echo "<option value = '3 Ibnu Majah'>3 Ibnu Majah</option>";
                        echo "<option value = '4 Ibnu Abbas'>4 Ibnu Abbas</option>";
                        echo "<option value = '4 Ibnu Khaldun' selected>4 Ibnu Khaldun</option>";
                        echo "<option value = '4 Ibnu Majah'>4 Ibnu Majah</option>";
                        echo "<option value = '5 Ibnu Abbas'>5 Ibnu Abbas</option>";
                        echo "<option value = '5 Ibnu Khaldun'>5 Ibnu Khaldun</option>";
                        echo "<option value = '5 Ibnu Majah'>5 Ibnu Majah</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($class = "4 Ibnu Majah"):
                        echo "<td><select name = 'class'>";
                        echo "<option value = '3 Ibnu Abbas'>3 Ibnu Abbas</option>";
                        echo "<option value = '3 Ibnu Khaldun'>3 Ibnu Khaldun</option>";
                        echo "<option value = '3 Ibnu Majah'>3 Ibnu Majah</option>";
                        echo "<option value = '4 Ibnu Abbas'>4 Ibnu Abbas</option>";
                        echo "<option value = '4 Ibnu Khaldun'>4 Ibnu Khaldun</option>";
                        echo "<option value = '4 Ibnu Majah' selected>4 Ibnu Majah</option>";
                        echo "<option value = '5 Ibnu Abbas'>5 Ibnu Abbas</option>";
                        echo "<option value = '5 Ibnu Khaldun'>5 Ibnu Khaldun</option>";
                        echo "<option value = '5 Ibnu Majah'>5 Ibnu Majah</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($class = "5 Ibnu Abbas"):
                        echo "<td><select name = 'class'>";
                        echo "<option value = '3 Ibnu Abbas'>3 Ibnu Abbas</option>";
                        echo "<option value = '3 Ibnu Khaldun'>3 Ibnu Khaldun</option>";
                        echo "<option value = '3 Ibnu Majah'>3 Ibnu Majah</option>";
                        echo "<option value = '4 Ibnu Abbas'>4 Ibnu Abbas</option>";
                        echo "<option value = '4 Ibnu Khaldun'>4 Ibnu Khaldun</option>";
                        echo "<option value = '4 Ibnu Majah'>4 Ibnu Majah</option>";
                        echo "<option value = '5 Ibnu Abbas' selected>5 Ibnu Abbas</option>";
                        echo "<option value = '5 Ibnu Khaldun'>5 Ibnu Khaldun</option>";
                        echo "<option value = '5 Ibnu Majah'>5 Ibnu Majah</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($class = "5 Ibnu Khaldun"):
                        echo "<td><select name = 'class'>";
                        echo "<option value = '3 Ibnu Abbas'>3 Ibnu Abbas</option>";
                        echo "<option value = '3 Ibnu Khaldun'>3 Ibnu Khaldun</option>";
                        echo "<option value = '3 Ibnu Majah'>3 Ibnu Majah</option>";
                        echo "<option value = '4 Ibnu Abbas'>4 Ibnu Abbas</option>";
                        echo "<option value = '4 Ibnu Khaldun'>4 Ibnu Khaldun</option>";
                        echo "<option value = '4 Ibnu Majah'>4 Ibnu Majah</option>";
                        echo "<option value = '5 Ibnu Abbas'>5 Ibnu Abbas</option>";
                        echo "<option value = '5 Ibnu Khaldun' selected>5 Ibnu Khaldun</option>";
                        echo "<option value = '5 Ibnu Majah'>5 Ibnu Majah</option>";
                        echo "</select></td></tr>";
                        break;
                    default :
                        echo "<td><select name = 'class'>";
                        echo "<option value = '3 Ibnu Abbas'>3 Ibnu Abbas</option>";
                        echo "<option value = '3 Ibnu Khaldun'>3 Ibnu Khaldun</option>";
                        echo "<option value = '3 Ibnu Majah'>3 Ibnu Majah</option>";
                        echo "<option value = '4 Ibnu Abbas'>4 Ibnu Abbas</option>";
                        echo "<option value = '4 Ibnu Khaldun'>4 Ibnu Khaldun</option>";
                        echo "<option value = '4 Ibnu Majah'>4 Ibnu Majah</option>";
                        echo "<option value = '5 Ibnu Abbas'>5 Ibnu Abbas</option>";
                        echo "<option value = '5 Ibnu Khaldun'>5 Ibnu Khaldun</option>";
                        echo "<option value = '5 Ibnu Majah' selected>5 Ibnu Majah</option>";
                        echo "</select></td></tr>";
                        break;
                        
                }
                
                if($row['gender']=="female"){
                    echo"<tr><th>Gender: </th><td><input type='radio' name='u_gender' value=Female checked>Female
                        <input type='radio' name='u_gender' value=Male>Male
                    </td></tr>"; 
                }
                else{
                    echo"<tr><th>Gender: </th><td><input type='radio' name='u_gender' value=Female>Female
                    <input type='radio' name='u_gender' value=Male checked>Male
                </td></tr>"; 
                }
                echo"<tr><td align='center' colspan='2'><input type='submit' name='submit' value='UPDATE'></td></tr>"; 
            }
            echo "</table>";
            echo "</form><br><br>";
        }
        else
        {
            echo "<br>0 result<br><br>";
        }
        $conn->close();
        ?>
    </section>
    <?php
    echo "<p></p>";
    include('footer.php');
?>
</body>
</html>