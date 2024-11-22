<html>
    <head>
        <title>Teachers Availability</title>
        <link rel="stylesheet" type="text/css" href="css/teacherinformation.css">
    </head>
<body class = "ti">
<?php
    include("head.php");
    include ("inc/connect.php");

    ?>
    <section>
        <form action = "" method = "GET">
            <input type = "text" name = "query" placeholder = "Teacher's name">
            <input type = "submit" name = "submit" value ="SEARCH">
        </form>
    </section>
    <article>
        <?php
        if(isset($_GET['submit'])) // If user click on the search button
        {
            if($_GET['query'] != NULL) // If text input has value
            {
                $query = $_GET['query'];
                $sql= "SELECT * FROM schedule INNER JOIN teacher on teacher.tusername = schedule.tusername WHERE status = 'Available' AND teacher.name LIKE '%".$query."%' ORDER BY date ASC";
                $result = mysqli_query($conn, $sql);
                $i = 1;

                if ($result->num_rows > 0)
                {
                    echo "<table>";
                    echo "<tr><th>NO</th><th>TEACHER NAME</th><th>DATE</th><th>START TIME</th><th>END TIME</th>
                        <th colspan=''<th>MAKE APPOINTMENT</th></tr>";

                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr>";
                        echo "<td>".$i++."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['start_time']."</td>";
                        echo "<td>".$row['end_time']."</td>";
                        ?>
                        <td> <?php
                            echo '<a href="teacheravailability.php">
                            <input type="button" value = "BOOK" onclick = "book()"></a>';
                        ?></td>
                        <?php
                        echo "</tr>";
                        ?>
                        <?php
                            echo "<script type='text/Javascript'>
                                    function book()
                                    {
                                        window.alert('Please login to book appointment.')
                                    }
                                </script>";
                            session_unset();
                    }
                    echo "</table><br><br>";
                }
                else
                {
                    echo "<br>0 result<br><br>";
                }
            }
        }
        else // Display all teacher after class schedule
        {
            $sql = "SELECT * FROM schedule INNER JOIN teacher on teacher.tusername = schedule.tusername WHERE status = 'Available' ORDER BY date ASC";
            $result = $conn->query($sql);
            $i = 1;

            if($result->num_rows > 0)
            {
                echo "<table>";
                echo "<tr><th>NO</th><th>TEACHER NAME</th><th>DATE</th><th>START TIME</th><th>END TIME</th>
                    <th colspan=''<th>MAKE APPOINTMENT</th></tr>";

                while($row = $result->fetch_assoc())
                {
                    echo "<tr>";                    
                    echo "<td>".$i++."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['start_time']."</td>";
                    echo "<td>".$row['end_time']."</td>";
                    ?>
                    <td> <?php
                        echo '<a href="teacheravailability.php">
                        <input type="button" value = "BOOK" onclick = "book()"></a>';
                    ?></td>
                    <?php
                    echo "</tr>";
                    ?>
                    <?php
                        echo "<script type='text/Javascript'>
                                function book()
                                {
                                    window.alert('Please login to book appointment.')
                                }
                            </script>";
                        session_unset();
                }
                echo "</table><br><br>";
            }
            else
            {
                echo "<br>0 result<br><br>";
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
