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
$query = "SELECT * FROM members WHERE uno='$uname' and password='$upass'";

$results = mysqli_query($connect, $query) or die(mysqli_error($connect));

if ($row = mysqli_fetch_array($results)) {
    echo "欢迎 " . $row['username'] . "<br/>";
    echo "<table  style='width:50%' class='CSSTableGenerator'>
    <tr></tr>
用户信息<tr>

<th>姓名</th>
<th>学号</th>
<th>年级</th>
</tr>";

    echo "<tr>";

    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['uno'] . "</td>";
    echo "<td>" . $row['branch'] . "</td>";

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


<!--<form method="post" action="add.php" style="float:right;">-->
<!--    <input type="submit" class="myButton" name="add" value="添加用户信息">-->
<!--</form>-->

<form method="post" action="../course/new_course_reg.php">
    <input type="submit" class="myButton" name="add" value="开始选课">
</form>
<form method="post" action="../../default.php" style="float:left;" >
    <input type="submit" class="myButton" name="add" value="登出">
</form>

<?php
echo "<div style=\"text-align: center;\"><h2>已注册课程</h2></div>";
$query = "Select regis.cno, course.name, course.credit, course.instructor , course.currentreg
FROM course 
INNER JOIN regis 
ON course.id=regis.cno 
AND regis.uno= '$uname';";

$results = mysqli_query($connect, $query) or die(mysqli_error($connect));

echo "<center><table style='width:50%' class='CSSTableGenerator'><tr><td><b>课程编号</b></td><td><b>课程名称</b></td><td><b>课时</b></td><td><b>教师</b></td><td><b>已选人数</b></td><td></td></tr>\n";
while ($rows = mysqli_fetch_assoc($results)) {
    echo "<tr>\n";
    foreach ($rows as $value) {
        echo "<td>\n";
        echo $value;
        echo "</td>\n";
    }
    echo "<td><a href='../course/Remove_Course.php?cname=$rows[cno]&uuname=$uname'>移除</a></td></tr><br>\n";
}
echo "</table></center>\n";
?>
<br/>

<!--<form method="get" action="../course/edit_course.php" style="float:right">-->
<!--    <input type="submit" class="myButton" name="add" value="编辑课程">-->
<!--</form>-->

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

















