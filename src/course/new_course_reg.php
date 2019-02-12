<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");


mysqli_select_db($connect, "2008b4a5723p");

$userno = $_SESSION['username'];
$query_u = "SELECT * FROM members WHERE uno='$userno'";

$results_u = mysqli_query($connect, $query_u) or die(mysqli_error($connect));

if ($row_u = mysqli_fetch_array($results_u)) {
    echo "<table  style='width:30%' class='CSSTableGenerator'>
    <tr></tr>
用户信息<tr>

<th>姓名</th>
<th>学号</th>
</tr>";

    echo "<tr>";

    echo "<td>" . $row_u['username'] . "</td>";
    echo "<td>" . $row_u['uno'] . "</td>";

    echo "</tr>";
} else {
    echo "LOGIN FAILED(INVALID USERNAME OR PASSWORD)";
    exit();
}
echo "</table>";


//echo "<h2>课程选择</h2>";
$query = "SELECT course.id,course.name,course.credit,course.instructor,course.currentreg,course.totalreg FROM course";
$results = mysqli_query($connect, $query) or die(mysqli_error($connect));
echo "<center><b>可选课程列表</b> <table  border=2><tr><td><b>课程编号</b></td><td><b>课程名称</b></td><td><b>课时</b></td><td><b>教师</b></td><td><b>已选人数</b></td><td><b>总人数</b></td></tr>\n";
while ($rows = mysqli_fetch_assoc($results)) {
    echo "<tr>\n";
    foreach ($rows as $value) {
        echo "<td>\n";
        echo $value;
        echo "</td>\n";
    }
    echo "</tr><br>\n";
}
echo "</table></center>\n";
?>

<html>
<body>
<form method="post" action="../registration/student_course.php">
    <br/>
    <!--    学号 : <input type="text" name="name"><br/>-->
    请输入要选的课程编号 :
    <!--    <input type="text" name="course">-->
    <input type="number" size="3" name="course" min="1" max="50" required/>
    <br/><br/><br/>
    <input type="submit" class="myButton" name="submit" value="确定选择">
</form>
<?php
$uname = $_SESSION['username'];
$upass = $_SESSION['pass'];
echo "<a href='../student/result.php?myusername=$uname&mypassword=$upass'>Back</a></br>";
?>
<!--<form method="post" action="../../default.php" style="float:left;" >-->
<!--    <input type="submit" class="myButton" name="add" value="登出">-->
<!--</form>-->
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