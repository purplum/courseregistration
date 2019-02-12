<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");

mysqli_select_db($connect, "2008b4a5723p");


?>
<html>
<head>
    <title>学生注册</title>
</head>
<body>

<form method="post" action="insert_data.php">
    <br/>
    <h2>学生注册</h2>
    姓名 :<input type="text" name="name"><br/>
    学号 :<input type="text" name="uno"><br/>
    密码 :<input type="password" name="pass"><br/>
    年级 :<input type="text" name="branch"><br/>

    <input type="submit" class="myButton" name="submit" value="Register">

</form>
<footer>
    <a href="../../default.php" style="color: white;">Back to home</a>
    2019 Allen Yin. Course Registration System
</footer>
</body>
</html>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<div id="div1"></div>
</body>
</html>	

