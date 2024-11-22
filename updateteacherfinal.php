<?php
    session_start();
    if (!isset($_SESSION['username']))
    {
        //Destroy the whole session
        $_SESSION = array();
        session_destroy();
    }
?>

<html>
<head>
    <title>Update Teacher Profile</title>
</head>

<body>
    <?php
    
        include("headteacher.php");
        include ('inc/connect.php');
        echo "<center>";    

        $nm = $_POST['u_name'];
        $eml = $_POST['u_email'];
        $pho = $_POST['u_phone'];
        $gen = $_POST['u_gender'];
        $field = $_POST['field'];
        
        $username= $_SESSION['username'];
        $error = false;
		$status = "";

        if(!empty ($_FILES["img"]{"name"}))
        {
            //file info 
            $file_name = basename($_FILES["img"]["name"]); 
            $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

            //make an array of allowed file extension
            $allowed_file_types = array('jpg','jpeg','png','gif','bmp','webp');

            //check if upload file is an image
            if( in_array($file_type, $allowed_file_types) ){ 

                $tmp_image = $_FILES['img']['tmp_name']; 
                $img_content = addslashes(file_get_contents($tmp_image)); 
                //$title = $_POST['title'];

                $sql = "UPDATE teacher SET name = '".$nm."', email='".$eml."' , phone='".$pho."' , gender='".$gen."' , field='".$field."', 
                img = '".$img_content."' where tusername='".$username."'";
                $result = $conn->query($sql);

                if ($conn->query($sql) === TRUE) 
                {
                    echo "<script>
                            alert('Profile has been updated');
                        </script>";
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacherprofile.php\">";
                }
                else 
                {
                    echo "<script>
                            alert('Profile cannot updated');
                        </script";
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacherprofile.php\">";
                }
            }
            else
            { 
                $error = true;
                $status = 'Only support jpg, jpeg, png, gif format'; 
            } 
        }
        else
        {
            $sql = "UPDATE teacher SET name = '".$nm."', email='".$eml."' , phone='".$pho."' , gender='".$gen."' , field='".$field."' 
            where tusername='".$username."'";
            $result = $conn->query($sql);

            if ($conn->query($sql) == TRUE) 
            {
                echo "<script>
                        alert('Profile has been updated');
                    </script>";
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacherprofile.php\">";
            }
            else 
            {
                echo "<script>
                        alert('Profile cannot updated');
                    </script";
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=teacherprofile.php\">";
            }
        }


$conn->close();

?>