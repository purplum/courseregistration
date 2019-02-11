<form name="form1" method="post" action="../../default.php">
    <input type="submit" class="myButton" name="Submit" value="学生登录">
</form>

<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection");
$name = $_SESSION['username'];
mysqli_select_db($connect, "2008b4a5723p");
echo "被学生 $name 注册的课程列表 :<br/>";
$query = "Select regis.cname, course.credit, course.instructor 
FROM course 
INNER JOIN regis 
ON course.name=regis.cname 
AND regis.uname= '$name'";

$results = mysqli_query($connect, $query) or die(mysqli_error($connect));

echo "<table  border=’2’><tr><td><b>课程编号</b></td><td><b>课时</b></td><td><b>教师</b></td></tr>\n";
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
<br/>
<br/>
<form method="post" action="course_edited.php">
    学生姓名 :<input type="text" name="name"><br/>
    要变更的课程编号:<input type="text" name="course"><br/>
    新的课程编号:<input type="text" name="new"><br/><br/>

    <input type="submit" class="myButton" name="submit" value="变更">
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