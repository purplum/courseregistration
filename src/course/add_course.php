<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

?>
<html>
<head>
    <title>添加新课程</title>
</head>
<body>
<!--<form name="form1" action="default.php">-->
<!--    <input type="submit" class="myButton" name="Submit" value="登录">-->
<!--</form>-->

<h2>添加新课程</h2>


<form method="post" action="insert_course.php">

    课程名称 : <input type="text" name="name"><br/>
    课时 :   <input type="text" name="credit"><br/>
    教师 :   <input type="text" name="instructor"><br/><br/><br/>

    <input type="submit" class="myButton" name="submit" value="添加">

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