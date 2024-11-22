<?php 
include('inc/connect.php');

$nm = $_POST['name'];
$gndr = $_POST['gender'];
$eml = $_POST['email'];   
$phn = $_POST['phone'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$status = $statusMsg = ''; 

if(isset($_POST["submitStu"]) || isset($_POST["submittea"]))
{ 
    $status = 'error'; 

    //Check if the input type is not empty
    if(!empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['username']) && !empty($_POST['pass']))
    {
        //Check if user registered as student or teacher

        if(isset($_POST['submitStu'])) //If user registered as student
        {
            $sqlcheckusernamestu = "SELECT susername from student where susername = '$username'";
            $resultcheckstu = $conn->query($sqlcheckusernamestu);

            //Check if username already existed in database

            if($resultcheckstu->num_rows > 0) //Username already existed in stu db
            {
                echo "<script>
                            alert ('Username is already existed. Please use different username.')
                        </script>";
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=registerstudentpage.php\">";
            }
            else // Username is not stored in db yet
            {

            //Check file uploaded
            
                if(!empty($_FILES["img"]["name"])) 
                { 
                    //Get file info
                
                    $fileName = basename($_FILES["img"]["name"]); 
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            
                    //Allow certain file formats
                    
                    $allowTypes = array('jpg','png','jpeg','gif'); 
                    if(in_array($fileType, $allowTypes))
                    { 
                        $image = $_FILES['img']['tmp_name']; 
                        $imgContent = addslashes(file_get_contents($image)); 

                        // Insert image content into database 
                        $class = $_POST['class'];    
                                
                        $sqls = "INSERT INTO student (susername, spass, img, name, gender, email, phone, class) VALUES ('$username', '$pass', '$imgContent', '$nm', '$gndr', '$eml', '$phn', '$class')" or die("Error inserting data into table");  

                        if($conn->query($sqls) == TRUE) //Successfully added new student record
                        {
                            echo "<script type='text/Javascript'>
                                    window.alert('Successfully created new account.')
                                </script>";
                            session_unset();
                            echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
                        }
                        else
                        {
                            echo "<script type='text/Javascript'>
                                    window.alert('Fail to create new account.')
                                </script>";
                            session_unset();
                            echo "<meta http-equiv=\"refresh\" content=\"0;URL=registerstudentpage.php\">";
                        }
                    }
                    else
                    { 
                        echo "<script>
                            alert ('Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.')
                        </script>";
                        session_unset();
                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=registerstudentpage.php\">";
                    } 
                }
                else
                {
                    echo "<script>
                            alert ('Please select an image file to upload.')
                        </script>";
                    session_unset();
                    echo "<meta http-equiv=\"refresh\" content=\"1;URL=registerstudentpage.php\">";
                } 
            }
        }
        else  //If user registered as teacher
        {
            $sqlcheckusernametea = "SELECT susername from student where susername = '$username'";
            $resultchecktea = $conn->query($sqlcheckusernametea);

            //Check if username already existed in database

            if($resultchecktea->num_rows > 0) //Username already existed in teacher db
            {
                echo "<script>
                            alert ('Username is already existed. Please use different username.')
                        </script>";
                session_unset();
                echo "<meta http-equiv=\"refresh\" content=\"1;URL=registerteacherpage.php\">";
            }
            else // Username is not stored in db yet
            {
                
            //Check file uploaded
            
                if(!empty($_FILES["img"]["name"])) 
                { 
                    //Get file info
                
                    $fileName = basename($_FILES["img"]["name"]); 
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            
                    //Allow certain file formats
                    
                    $allowTypes = array('jpg','png','jpeg','gif'); 
                    if(in_array($fileType, $allowTypes))
                    { 
                        $image = $_FILES['img']['tmp_name']; 
                        $imgContent = addslashes(file_get_contents($image)); 

                        // Insert image content into database 
                        $field = $_POST['field'];    
                                
                        $sqlt = "INSERT INTO teacher (tusername, tpass, img, name, gender, email, phone, field) VALUES ('$username', '$pass', '$imgContent', '$nm', '$gndr', '$eml', '$phn', '$field')" or die("Error inserting data into table");  

                        if($conn->query($sqlt) == TRUE) //Successfully added new teacher record
                        {
                            echo "<script type='text/Javascript'>
                                    window.alert('Successfully created new account.')
                                </script>";
                            session_unset();
                            echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
                        }
                        else
                        {
                            echo "<script type='text/Javascript'>
                                    window.alert('Fail to create new account.')
                                </script>";
                            session_unset();
                            echo "<meta http-equiv=\"refresh\" content=\"0;URL=registerteacherpage.php\">";
                        }
                    }
                    else
                    { 
                        echo "<script>
                                alert ('Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.')
                            </script>";
                        session_unset();
                        echo "<meta http-equiv=\"refresh\" content=\"1;URL=registerstudentpage.php\">";
                    } 
                }
                else
                { 
                    echo "<script>
                            alert ('Please select an image file to upload.')
                        </script>";
                    session_unset();
                    echo "<meta http-equiv=\"refresh\" content=\"1;URL=registerstudentpage.php\">";
                } 
            }
        }
    }
    else
    {
        echo "<script>
                alert ('Please fill in all field.')
            </script>";
        if (isset($_POST["submitStu"]))
        {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=registerstudentpage.php\">";
        }
        else
        {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=registerteacherpage.php\">";
        }
    }
} 
 
// Display status message 
echo $statusMsg; 
?>