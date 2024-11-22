<?php
    session_start();
    include("inc/connect.php");
?>
<html>
<head>
    <title>About Teachers</title>
    <link rel="stylesheet" type="text/css" href="css/teacherinformation.css">
</head>

<body class = "ti">
    <?php
    include("headstudent.php");
    ?>
    <section>
        <form action = "" method="GET">
            <input type="text" name="query" placeholder = "Teacher's name">
            <input type = "submit" name = "submit" value = "SEARCH">
        </form>
    </section>  
    <article>
        <?php
        if(isset($_GET['submit'])) // If user wants to view specific teacher
        {
            if($_GET["query"] != NULL) // If button search clicked with input
            {
                $query = $_GET['query']; 
                $sql = "SELECT * FROM teacher WHERE name LIKE '%".$query."%'";
                $result = $conn->query($sql);
                $i = 1;
        
                if ($result->num_rows > 0)
                {?>
                    <table>
                        <tr>
                            <th>NO</th>
                            <th>IMAGE</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>GENDER</th>
                            <th>PHONE</th>
                            <th>FIELD</th>
                        </tr>
                        <?php 
                        while($row = $result->fetch_assoc())
                        {?>
                            <tr>
                                <td width = "5%"><?php echo $i++;?></td>
                                <td> <img width = '120px' height = '180px' src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" /> </td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['field'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <br><br>
                <?php
                }
                else
                {
                    echo "0 result";
                }
            }
        }
        else //Display all teacher
        {
            $sql = "SELECT * FROM teacher";
            $result = $conn->query($sql);
            $i = 1;
        
                if ($result->num_rows > 0)
                {?>
                
                    <table>
                        <tr>
                            <th>NO</th>
                            <th>IMAGE</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>GENDER</th>
                            <th>PHONE</th>
                            <th>FIELD</th>
                        </tr>
                        <?php 
                        while($row = $result->fetch_assoc())
                        {?>
                            <tr>
                                <td width = "5%"><?php echo $i++;?></td>
                                <td> <img width = '180px' height = '180px' src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" /> </td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['field'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <br><br>
                <?php
                }
                else
                {
                    echo "0 result";
                }
        }
        ?>
    </article>
    
    <?php
        $conn->close();
        include("footer.php");
    ?>
</body>
</html>