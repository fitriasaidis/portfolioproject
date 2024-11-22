<html>
<head>
    <title>Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/registerpage.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body class = "register">
    <section>
        <form id = "registerForm" name = "registerForm" method = "POST" action = "register.php" enctype = "multipart/form-data">
            <table>  
                <tr>
                    <th colspan = "2">
                        <h4>Register Here</h4>
                    </th>
                </tr> 
                <tr>
                <tr>
                    <th>
                        Profile picture:
                    </th>
                    <td>
                        <input type="file" name="img"><br>
                    </td>
                </tr>
                <tr>
                    <th>
                        Full Name:
                    </th>
                    <td>
                        <input type = "text" name = "name" size = "30">
                    </td>
                </tr>
                <tr>
                    <th>
                        Gender:
                    </th>
                    <th>
                        <input type = "radio" name = "gender" value="Female" checked>Female
                        <input type = "radio" name = "gender" value="Male">Male
                    </th>
                </tr>
                <tr>
                    <th>
                        Email:
                    </th>
                    <td>
                        <input type = "email" name = "email">
                    </td>
                </tr>
                <tr>
                    <th>
                        Phone Number:
                    </th>
                    <td>
                        <input type = "text" name = "phone">
                    </td>
                </tr>
                <tr>
                    <th>
                        Field:
                    </th>
                    <td>
                    <select id = "field" name = "field">
                            <option value="Malay Language" selected>Malay Language</option>
                            <option value="English Language">English Language</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="History">History</option>
                            <option value="Islamic education">Islamic education</option>
                            <option value="Visual Arts Education">Visual Arts Education</option>
                            <option value="Geography">Geography</option>
                            <option value="Basic Economics">Basic Economics</option>
                            <option value="Chemistry">Chemistry</option>
                            <option value="Biology">Biology</option>
                            <option value="Information and Communication Technology">Information and Communication Technology</option>  
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>
                        Username:
                    </th>
                    <td>
                        <input type = "text" name = "username" size = "30">
                    </td>
                </tr>
                <tr>
                    <th>
                        Password:
                    </th>
                    <td>
                        <input type = "password" id = "pass" name = "pass" size = "30">
                    </td>
                </tr>
                <tr>
                    <th colspan = "2">
                        <input type = "submit" name = "submittea" id="submittea" value = "REGISTER">
                    </th>
                </tr>
                <tr>
                    <th style = "text-align:center" colspan = "2">
                        <h5><br>Already has an acount? Login <a href = 'loginpage.php'>Here</a></h5>  
                    </th>
                </tr>
            </table>
        </form>  
    </section> 
    <?php
        include("footer.php");
    ?>
</body>
</html>