<?php
session_start();
if ($_SESSION['authuser'] != 1) {
    echo "ACCESS DENIED";
    exit();
}

$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");
mysqli_select_db($connect, "2008b4a5723p");

$cname = $_POST['course'];
$name = $_POST['name'];

$q = "SELECT count(cname) FROM regis WHERE uname='$name'";                 // for verifying the total courses by a student
$r = mysqli_query($connect, $q) or die(mysqli_error($connect));
$reg = mysqli_fetch_assoc($r);
foreach ($reg as $value) {
    if ($value > 3) {
        echo "<a href='../course/new_course_reg.php'>Back</a></br>";
        echo "注册错误(您已经注册了4门课程)";
        exit();
    }
}

$q1 = "SELECT count(cname) FROM regis WHERE cname='$cname'";                 // for verifying the total students in the course
$r1 = mysqli_query($connect, $q1) or die(mysqli_error($connect));
$reg1 = mysqli_fetch_assoc($r1);
foreach ($reg1 as $value1) {
    if ($value1 > 15) {
        printf("注册错误(课程允许学生数已满)");
        exit();
    }
}

$q2 = "SELECT cname FROM regis WHERE cname='$cname' AND uname='$name'";                 // for verifying the if student has already registered for the course
$r2 = mysqli_query($connect, $q2) or die(mysqli_error($connect));
$reg2 = mysqli_fetch_assoc($r2);
if (mysqli_num_rows($r2) != 0) {
    echo "<a href='../course/new_course_reg.php'>Back</a><br/>课程已被学生 $name 注册";
    exit();
}


$query = "SELECT name FROM course WHERE name='$cname'";              //for inserting the record
$results = mysqli_query($connect, $query) or die(mysqli_error($connect));
if ($rows = mysqli_fetch_assoc($results)) {
    foreach ($rows as $value)
        echo $value;

    echo "<br/>以上课程已被成功添加";
    echo "<br/>";
    echo "<a href='../course/new_course_reg.php'>Back</a></br>";
    $insert = "INSERT INTO regis(uname,cname)
values('$name','$value')";
    $results = mysqli_query($connect, $insert) or die(mysqli_error($connect));
} else {
    echo "error in registration";
    exit();
}

$sum = 0;
$q2 = "SELECT count(cname) FROM regis WHERE uname='$name'";                 // total credit of courses for each student
$r2 = mysqli_query($connect, $q2) or die(mysqli_error($connect));
$reg2 = mysqli_fetch_assoc($r2);
foreach ($reg2 as $value2) {
    if ($value2 == 4)                                                        //If 4 courses registered the will check credit hours
    {

        $q3 = "SELECT cname FROM regis WHERE uname='$name'";
        $r3 = mysqli_query($connect, $q3) or die(mysqli_error($connect));
        while ($reg3 = mysqli_fetch_assoc($r3)) {
            foreach ($reg3 as $value3) {
                $q4 = "SELECT credit FROM course WHERE name='$value3'";
                $r4 = mysqli_query($connect, $q4) or die(mysqli_error($connect));
                $reg4 = mysqli_fetch_assoc($r4);
                foreach ($reg4 as $value4) {
                    $sum = $sum + $value4;
                }
            }
        }
        if ($sum < 9)                                        //If credit hours are less then 9 then registration error
        {
            printf("注册错误(总课时数小于 9)");
            exit();
        }
    }
}
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


