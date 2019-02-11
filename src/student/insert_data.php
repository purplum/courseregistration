<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");


mysqli_select_db($connect, "2008b4a5723p");
$name = $_POST['name'];
$pass = $_POST['pass'];
$branch = $_POST['branch'];
$year = $_POST['year'];

if ($name == '' or $pass == '' or $branch == '' or $year == "1")
    echo "注册错误";

else {
    $insert = "INSERT INTO members(username,password,branch,year)
values('$name','$pass','$branch','$year')";

    $results = mysqli_query($connect, $insert) or die(mysqli_error($connect));

    echo " 成功添加信息";
}
?>
<form method="post" action="../../default.php">
    <input type="submit" class="myButton" name="wel" value="点击登录">
</form>

<footer>
    <a href="../../default.php" style="color: white;">Back to home</a>
    2019 Allen Yin. Course Registration System
</footer>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<div id="div1"></div>
</body>
</html>	

