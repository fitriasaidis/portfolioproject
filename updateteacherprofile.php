<?php
    session_start();
    include("headteacher.php");
    include ('inc/connect.php');
?>
<html>
<head>
    <title>Teacher Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<body class = "updateprofile">
    <section>
        <?php
        $username= $_SESSION['username'];

        $sql= "SELECT * FROM teacher where tusername='$username'";
        $result = $conn->query($sql);

        if($result->num_rows>0){

            //output data of each row
            while($row=$result->fetch_assoc())
            {
                echo"<center><h3>UPDATE PROFILE</h3><hr/></center>";
                echo"<form method='post' action='updateteacherfinal.php' enctype = 'multipart/form-data'>";
                echo "<center>";
                echo "<img width = '180px' height = '200px' src='data:image/jpg;charset=utf8;base64,"?><?php echo base64_encode($row['img']); ?><?php echo"' />";
                echo "<p>";
                ?>
                <p><input type="file" id = "img" name="img"></p>

                <?php
                echo"<table>";
                echo "<p>";
                echo "<tr><th>Username: </th><td>".$row['tusername']."</td></tr>";
                echo "<tr><th>Name: </th><td><input type='text' name='u_name' value='".$row['name']."'></td></tr>";
                echo "<tr><th>Email: </th><td><input type='text' name='u_email' value='".$row['email']."'></td></tr>";
                echo "<tr><th>Phone No: </th><td><input type='text' name='u_phone' value='".$row['phone']."'></td></tr>";
                echo "<tr><th>Field: </th>";
                
                $field = $row['field'];
                switch($row['field'])
                {
                    case ($field = "Malay Language"):
                        echo "<td><select name = 'field'>";
                        echo "<option value = 'Malay Language' selected>Malay Language</option>";
                        echo "<option value = 'English Language'>English Language</option>";
                        echo "<option value = 'Mathematics'>Mathematics</option>";
                        echo "<option value = 'Science'>Science</option>";
                        echo "<option value = 'History'>History</option>";
                        echo "<option value = 'Islamic Education'>Islamic Education</option>";
                        echo "<option value = 'Visual Arts Education'>Visual Arts Education</option>";
                        echo "<option value = 'Geography'>Geography</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($field = "English Language"):
                        echo "<td><select name = 'field'>";
                        echo "<option value = 'Malay Language'>Malay Language</option>";
                        echo "<option value = 'English Language' selected>English Language</option>";
                        echo "<option value = 'Mathematics'>Mathematics</option>";
                        echo "<option value = 'Science'>Science</option>";
                        echo "<option value = 'History'>History</option>";
                        echo "<option value = 'Islamic Education'>Islamic Education</option>";
                        echo "<option value = 'Visual Arts Education'>Visual Arts Education</option>";
                        echo "<option value = 'Geography'>Geography</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($field = "Mathematics"):
                        echo "<td><select name = 'field'>";
                        echo "<option value = 'Malay Language'>Malay Language</option>";
                        echo "<option value = 'English Language'>English Language</option>";
                        echo "<option value = 'Mathematics' selected>Mathematics</option>";
                        echo "<option value = 'Science'>Science</option>";
                        echo "<option value = 'History'>History</option>";
                        echo "<option value = 'Islamic Education'>Islamic Education</option>";
                        echo "<option value = 'Visual Arts Education'>Visual Arts Education</option>";
                        echo "<option value = 'Geography'>Geography</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($field = "Science"):
                        echo "<td><select name = 'field'>";
                        echo "<option value = 'Malay Language'>Malay Language</option>";
                        echo "<option value = 'English Language'>English Language</option>";
                        echo "<option value = 'Mathematics'>Mathematics</option>";
                        echo "<option value = 'Science' selected>Science</option>";
                        echo "<option value = 'History'>History</option>";
                        echo "<option value = 'Islamic Education'>Islamic Education</option>";
                        echo "<option value = 'Visual Arts Education'>Visual Arts Education</option>";
                        echo "<option value = 'Geography'>Geography</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($field = "History"):
                        echo "<td><select name = 'field'>";
                        echo "<option value = 'Malay Language'>Malay Language</option>";
                        echo "<option value = 'English Language'>English Language</option>";
                        echo "<option value = 'Mathematics'>Mathematics</option>";
                        echo "<option value = 'Science'>Science</option>";
                        echo "<option value = 'History' selected>History</option>";
                        echo "<option value = 'Islamic Education'>Islamic Education</option>";
                        echo "<option value = 'Visual Arts Education'>Visual Arts Education</option>";
                        echo "<option value = 'Geography'>Geography</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($field = "Islamic Education"):
                        echo "<td><select name = 'field'>";
                        echo "<option value = 'Malay Language'>Malay Language</option>";
                        echo "<option value = 'English Language'>English Language</option>";
                        echo "<option value = 'Mathematics'>Mathematics</option>";
                        echo "<option value = 'Science'>Science</option>";
                        echo "<option value = 'History'>History</option>";
                        echo "<option value = 'Islamic Education' selected>Islamic Education</option>";
                        echo "<option value = 'Visual Arts Education'>Visual Arts Education</option>";
                        echo "<option value = 'Geography'>Geography</option>";
                        echo "</select></td></tr>";
                        break;
                    case ($field = "Visual Arts Education"):
                        echo "<td><select name = 'field'>";
                        echo "<option value = 'Malay Language'>Malay Language</option>";
                        echo "<option value = 'English Language'>English Language</option>";
                        echo "<option value = 'Mathematics'>Mathematics</option>";
                        echo "<option value = 'Science'>Science</option>";
                        echo "<option value = 'History'>History</option>";
                        echo "<option value = 'Islamic Education'>Islamic Education</option>";
                        echo "<option value = 'Visual Arts Education' selected>Visual Arts Education</option>";
                        echo "<option value = 'Geography'>Geography</option>";
                        echo "</select></td></tr>";
                        break;
                    default :
                        echo "<td><select name = 'field'>";
                        echo "<option value = 'Malay Language'>Malay Language</option>";
                        echo "<option value = 'English Language'>English Language</option>";
                        echo "<option value = 'Mathematics'>Mathematics</option>";
                        echo "<option value = 'Science'>Science</option>";
                        echo "<option value = 'History'>History</option>";
                        echo "<option value = 'Islamic Education'>Islamic Education</option>";
                        echo "<option value = 'Visual Arts Education'>Visual Arts Education</option>";
                        echo "<option value = 'Geography' selected>Geography</option>";
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
                echo"<tr><th colspan='2'><input type='submit' name='submit' value='UPDATE'></th></tr>";
            }
            echo"</table>";
            echo"</form>";
        }else{
            echo"<br>0 result<br>";
        }
        $conn->close();
        echo "<p></p>";
        ?>
    </section>
<?php
include('footer.php');
?>
</body>
</html>