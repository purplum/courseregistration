<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection");
$uname = $_GET['myusername'];
$upass = $_GET['mypassword'];

$_SESSION['username'] = $uname;
$_SESSION['pass'] = $upass;

mysqli_select_db($connect, "2008b4a5723p");
$query = "SELECT * FROM members WHERE username='$uname' and password='$upass'";

$results = mysqli_query($connect, $query) or die(mysqli_error($connect));

if ($row = mysqli_fetch_array($results)) {
    echo "Welcome " . $row['username'] . "!!<br/>";
    echo "<table  style='width:50%' class='CSSTableGenerator'>
用户信息<tr>

<th>姓名</th>

<th>年级</th>
<th>毕业年份</th>
</tr>";

    echo "<tr>";

    echo "<td>" . $row['username'] . "</td>";

    echo "<td>" . $row['branch'] . "</td>";
    echo "<td>" . $row['year'] . "</td>";
    echo "</tr>";
} else {
    echo "LOGIN FAILED(INVALID USERNAME OR PASSWORD)";
    exit();
}
echo "</table>";

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<div id="div1"></div>
</body>
</html>
<br/><br/>
<form method="post" action="../../default.php" style="float:right;">
    <input type="submit" class="myButton" name="add" value="登出">
</form>

<form method="post" action="add.php" style="float:right;">
    <input type="submit" class="myButton" name="add" value="添加用户信息">
</form>

<form method="post" action="../course/new_course_reg.php">
    <input type="submit" class="myButton" name="add" value="课程注册">
</form>


<?php
echo "<center><h2>已注册课程</h2></center>";
$query = "Select regis.cname, course.credit, course.instructor 
FROM course 
INNER JOIN regis 
ON course.name=regis.cname 
AND regis.uname= '$uname';";

$results = mysqli_query($connect, $query) or die(mysqli_error($connect));

echo "<center><table style='width:50%' class='CSSTableGenerator'><tr><td></td><td><b>课程编号</b></td><td><b>课时</b></td><td><b>教师</b></td></tr>\n";
while ($rows = mysqli_fetch_assoc($results)) {
    echo "<tr><td><a href='Remove_Course.php?cname=$rows[cname]&uuname=$uname'>移除</a></td>\n";
    foreach ($rows as $value) {
        echo "<td>\n";
        echo $value;
        echo "</td>\n";
    }
    echo "</tr><br>\n";
}
echo "</table></center>\n";
?>
<br/>

<form method="get" action="../course/edit_course.php" style="float:right">
    <input type="submit" class="myButton" name="add" value="编辑课程">
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

















