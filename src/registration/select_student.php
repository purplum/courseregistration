<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");
mysqli_select_db($connect, "2008b4a5723p");

$name = $_POST['name'];
$query = "SELECT cname FROM regis WHERE uname='$name'";
$results = mysqli_query($connect, $query) or die(mysqli_error($connect));
echo "<a href='../admin/admin_page.php'>管理员登录</a><br/>";
echo "课程被 : " . $name . " 登记";
echo "<table  border=2>\n";
while ($rows = mysqli_fetch_assoc($results)) {
    echo "<tr>\n";
    foreach ($rows as $value) {
        echo "<td>\n";
        echo $value;
        echo "</td>\n";
    }
    echo "</tr><br>\n";
}
echo "</table>\n";
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