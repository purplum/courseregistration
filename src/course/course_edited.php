<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");
mysqli_select_db($connect, "2008b4a5723p");

$name = $_POST['name'];
$course = $_POST['course'];
$new = $_POST['new'];

if ($_SESSION['authuser'] != $name) {
    echo "您不能修改其他人的课程!";
    exit();
}

$query = "update regis SET cname = '$new' WHERE uname = '$name' AND cname = '$course'";
$results = mysqli_query($connect, $query) or die(mysqli_error($connect));
echo "<a href='edit_course.php'>返回</a><br/>课程修改成功";

?>
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