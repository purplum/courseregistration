<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}
?>
<form method="post" action="modify.php">
    <h2>添加用户信息</h2>
    添加用户信息名称:<input type="text" name="info"><br/>
    添加信息 :<input type="text" name="value"><br/>
    <input type="submit" class="myButton" name="submit" value="submit">
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