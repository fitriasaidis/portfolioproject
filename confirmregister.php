<!DOCTYPE html>
<html>

<head>
    <title>Confirm Register as Teacher</title>          
</head>

<body>
    <script type="text/Javascript">
        //window.alert("Hi student. Welcome to my class"); 
        var answer = window.confirm("Are you signup as a teacher? [Okay = YES  Cancel = NO]");

        if(answer)
        {
            var pass = window.prompt("Please enter your password" , 0);
            if(pass == 't123')
            {
                window.location.href = 'registerteacherpage.php';
            }
            else
            {
                window.alert("Wrong password!"); 
                window.location.href = 'loginpage.php';
            }
        }
        else
        {
            window.location.href = 'registerstudentpage.php';           
        }
    </script>
    
</body>
</html>