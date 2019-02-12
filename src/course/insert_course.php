<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");

mysqli_select_db($connect, "2008b4a5723p");

$name = $_POST['name'];
$credit = $_POST['credit'];
$instructor = $_POST['instructor'];
$totalreg = $_POST['totalreg'];

if ($name == '' or $credit == '' or $instructor == '' or $totalreg == '')
    echo "注册错误";

else {
    $insert = "INSERT INTO course(name,credit,totalreg,instructor)
values('$name','$credit','$totalreg','$instructor')";

    $results = mysqli_query($connect, $insert) or die(mysqli_error($connect));

    echo " 成功添加课程 [$name] 信息<br/><br/><br/><a href='../admin/admin_page.php'>返回</a><br/><a href='add_course.php'>继续添加</a>";
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<div id="div1"></div>
<footer>
    <a href="../../default.php" style="color: white;">Back to home</a>
    2019 Allen Yin. Course Registration System
</footer>
</body>
</html>	