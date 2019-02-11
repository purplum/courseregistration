<?php
session_start();
if($_SESSION['authuser']!=1)
{
echo"ACCESS DENIED";
exit();
}
$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");

mysqli_select_db($connect,"2008b4a5723p");


$remove = "DELETE FROM regis WHERE  cname='$_GET[cname]' and uname='$_GET[uuname]'";

$results=mysqli_query($connect,$remove) or die(mysqli_error($connect));

echo " 成功移除课程<br/><a href='../../default.php'>返回</a>";



?>

<footer>
    <a href="../../default.php" style="color: white;">Back to home</a>
    2019 Allen Yin. Course Registration System
</footer>