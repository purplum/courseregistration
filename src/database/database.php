<?php
$connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection.");

mysqli_query($connect, "DROP DATABASE 2008b4a5723p");

mysqli_query($connect, "CREATE DATABASE 2008b4a5723p");

mysqli_select_db($connect, "2008b4a5723p");

$members = "CREATE TABLE members (
id int(4) NOT NULL auto_increment,
username varchar(65) NOT NULL default '',
password varchar(65) NOT NULL default '',
uno varchar(65) NOT NULL default '' ,
branch varchar(65) NOT NULL default '' ,
PRIMARY KEY (id)
)Engine=InnoDB AUTO_INCREMENT=1 charset=utf8 ";

$course = "CREATE TABLE course (
id int(4) NOT NULL auto_increment,
name varchar(65) NOT NULL default '',
credit int NOT NULL ,
currentreg int NOT NULL default 0,
totalreg int NOT NULL  default 0,
instructor varchar(65) NOT NULL default '',
PRIMARY KEY (id)
)Engine=InnoDB AUTO_INCREMENT=1 charset=utf8 ";

$regis = "CREATE TABLE regis (
id int(4) NOT NULL auto_increment,
uno varchar(65) NOT NULL,
cno int(4) NOT NULL,
PRIMARY KEY (id)
)Engine=InnoDB AUTO_INCREMENT=1 charset=utf8 ";


$results = mysqli_query($connect, $members) or die (mysqli_error($connect));
$results = mysqli_query($connect, $course) or die (mysqli_error($connect));
$results = mysqli_query($connect, $regis) or die (mysqli_error($connect));
echo "成功创建数据库!";


?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<div id="div1"></div>
</body>
</html>	