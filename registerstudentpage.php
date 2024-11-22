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
                        <h4><u>Re</u>gister Here</h4>
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
                        <input type = "text" name = "name" size = "30" autofocus>
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
                        Class:
                    </th>
                    <td>
                        <select id = "class" name = "class">
                            <option value="4 Ibnu Abbas" selected >4 Ibnu Abbas</option>
                            <option value="4 Ibnu Khaldun">4 Ibnu Khaldun</option>
                            <option value="4 Ibnu Majah">4 Ibnu Majah</option>
                            <option value="4 Ibnu Sina">4 Ibnu Sina</option>
                            <option value="5 Ibnu Abbas">5 Ibnu Abbas</option>
                            <option value="5 Ibnu Khaldun">5 Ibnu Khaldun</option>
                            <option value="5 Ibnu Majah">5 Ibnu Majah</option>
                            <option value="5 Ibnu Sina">5 Ibnu Sina</option>
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
                        <input type = "submit" name = "submitStu" id="submitStu" value = "REGISTER">
                    </th>
                </tr>
                <tr>
                    <th colspan = "2">
                        <h5>Already has an acount? Login <a href = 'loginpage.php'>Here</a></h5>  
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