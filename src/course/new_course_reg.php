<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");

mysqli_select_db($connect, "2008b4a5723p");

echo "<h2>课程选择</h2>";
$query = "SELECT course.name FROM course";
$results = mysqli_query($connect, $query) or die(mysqli_error($connect));
echo "<b>可选课程列表</b> <table  border=2>\n";
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

<html>
<body>
<form method="post" action="../registration/student_course.php">
    <br/>
    姓名 : <input type="text" name="name"><br/>
    课程编号 : <input type="text" name="course">
    <br/>
    <input type="submit" class="myButton" name="submit" value="注册">
</form>
</body>
</html>
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