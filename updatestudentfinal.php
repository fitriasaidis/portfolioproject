<?php
    session_start();
    include ('inc/connect.php');

    $nm = $_POST['u_name'];
    $eml = $_POST['u_email'];
    $pho = $_POST['u_phone'];
    $gen = $_POST['u_gender'];
    $cls = $_POST['class'];
    
    $username= $_SESSION['username'];
    $error = false;
    $status = "";

    if(!empty ($_FILES["img"]["name"]))
    {
        //file info 
        $file_name = basename($_FILES["img"]["name"]); 
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

        //make an array of allowed file extension
        $allowed_file_types = array('jpg','jpeg','png','gif','bmp','webp');

        //check if upload file is an image
        if( in_array($file_type, $allowed_file_types) )
        { 
            $tmp_image = $_FILES['img']['tmp_name']; 
            $img_content = addslashes(file_get_contents($tmp_image)); 

            $sql = "UPDATE student SET name = '".$nm."', email='".$eml."' , phone='".$pho."' , gender='".$gen."' , class='".$cls."', 
            img = '".$img_content."' where susername='".$username."'";
            $result = $conn->query($sql);

            if ($result == TRUE) 
            {
                echo "<script type='text/Javascript'>
                                window.alert('Profile has been updated')
                            </script>";
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=studentprofile.php\">";
            }
            else 
            {
                echo "<script type='text/Javascript'>
                        window.alert('Profile cannot updated')
                    </script>";
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=studentprofile.php\">";
            }
        }
        else
        { 
            $error = true;
            $status = 'Only support jpg, jpeg, png, webp, gif format'; 
        } 
    }
    else
    {
        $sql = "UPDATE student SET name = '".$nm."', email='".$eml."' , phone='".$pho."' , gender='".$gen."' , class='".$cls."' where susername ='".$username."'";
        $result = $conn->query($sql);

        if ($result == TRUE) 
        {
            echo "<script type='text/Javascript'>
                                window.alert('Profile has been updated')
                            </script>";
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=studentprofile.php\">";
        }
        else 
        {
            echo "<script type='text/Javascript'>
                        window.alert('Profile cannot updated.')
                    </script>";
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=studentprofile.php\">";
        }
    }

    $conn->close();

?>