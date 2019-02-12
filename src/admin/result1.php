<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

$name = $_POST['myusername'];
$pass = $_POST['mypassword'];


if ($name != "admin" && $pass != "admin") {
    echo "ACCESS DENIED";
    exit();
}

$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection");
$uname = $_GET['myusername'];
$upass = $_GET['mypassword'];

$_SESSION['username'] = $uname;
$_SESSION['pass'] = $upass;

mysqli_select_db($connect, "2008b4a5723p");
$query = "SELECT id,name,credit,currentreg,totalreg,instructor FROM course ";

$results = mysqli_query($connect, $query) or die(mysqli_error($connect));

echo "<table  style='width:50%' class='CSSTableGenerator'>
已有课程信息<tr>

<th>课程编号</th>
<th>课程名称</th>
<th>课时</th>
<th>教师</th>
<th>已选人数</th>
<th>最大人数</th>
</tr>";
while ($rows = mysqli_fetch_array($results)) {
    echo "<tr>";
    echo "<td>" . $rows['id'] . "</td>";
    echo "<td>" . $rows['name'] . "</td>";
    echo "<td>" . $rows['credit'] . "</td>";
    echo "<td>" . $rows['instructor'] . "</td>";
    echo "<td>" . $rows['currentreg'] . "</td>";
    echo "<td>" . $rows['totalreg'] . "</td>";
    echo "<td><a href='Remove_Course.php?cname=$rows[cname]&uuname=$uname'>移除</a></td>\n";

    echo "</tr><br>\n";

}
echo "</table></center>\n";


?>
<html>
<body>
<form method="post" action="../student/select_course.php">
    课程编号:<input type="text" name="cname">
    <input type="submit" class="myButton" name="submit" value="学生已登记">
</form>

<form method="post" action="../registration/select_student.php">
    学生姓名 :<input type="text" name="name">
    <input type="submit" class="myButton" name="submit" value="课程已登记">
</form>

<form method="post" action="../course/add_course.php">
    <input type="submit" class="myButton" name="wel" value="添加新课程">
</form>
<form method="post" action="admin_edit_course.php">
    <input type="submit" class="myButton" name="submit" value="编辑现有学生课程">
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

