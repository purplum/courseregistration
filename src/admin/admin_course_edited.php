<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");
mysqli_select_db($connect,"2008b4a5723p");

$name = $_POST['name'];
$course = $_POST['course'];
$new = $_POST['new'];

$query = "update regis SET cname = '$new' WHERE uname = '$name' AND cname = '$course'";
$results = mysqli_query($connect, $query) or die(mysqli_error($connect));
echo "COURSE CHANGED SUCESSFULLY";

?>
<footer>
    <a href="../../default.php" style="color: white;">返回主页</a>
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