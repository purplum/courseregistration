<?php
session_start();
session_destroy();
session_start();
$_SESSION['authuser'] = 1;


if (isset($_POST['save_btn'])) {
    //write some of your code here, if necessary


    $connect = mysqli_connect("localhost", "root", "mysql") or die ("check your server connection");
    $uname = $_GET['myusername'];
    $upass = $_GET['mypassword'];

    $_SESSION['username'] = $uname;
    $_SESSION['pass'] = $upass;

    mysqli_select_db($connect, "2008b4a5723p");
    $query = "SELECT * FROM members WHERE uno='$uname' and password='$upass'";

    $results = mysqli_query($connect, $query) or die(mysqli_error($connect));

    if ($row = mysqli_fetch_array($results)) {
        echo '<script> window.location="src/student/result.php"; </script> ';
    } else {
        echo "登录失败(用户名或密码错误)";
        exit();
    }
}
?>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ADD8E6">
    <tr>
        <form name="form1" method="get" action="src/student/result.php" onsubmit="return validate(this);">
            <td>
                <table width="100%" border="0" cellpadding="7" cellspacing="1" bgcolor="#ADD8E6">
                    <tr>
                        <td colspan="3"><strong>
                                <div style="text-align: center;"><h2>学生登录</h2></div>
                            </strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>学号:</td>
                        <td>
                            <div style="text-align: center;"><input name="myusername" placeholder="USERNAME" type="text"
                                                                    id="myusername">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <div style="text-align: center;">
                            <td>密码:</td>
                            <td>
                                <div style="text-align: center;"><input name="mypassword" placeholder="PASSWORD"
                                                                        type="password" id="mypassword">
                                </div>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" class="myButton" name="Submit" value="登录"></td>
        </form>
        <form name="form2" method="post" action="src/student/newreg.php">
            <td><input type="submit" class="myButton" name="newreg" value="注册"></td>
        </form>
        <form name="form1" method="post" action="src/admin/admin_page.php">
            <td><input type="submit" class="myButton" name="Submit" value="管理员登录"></td>
        </form>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
</td>
</tr>
</table>


<html>
<head>
    <script type="text/javascript">
        function validate(form) {
            var userName = form.myusername.value;
            var password = form.mypassword.value;

            if (userName.length === 0) {
                alert("请输入用户名.");
                return false;
            }

            if (password.length === 0) {
                alert("请输入密码.");
                return false;
            }

            return true;
        }
    </script>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div id="div1"></div>

<footer>
    <a href="default.php" style="color: white;"></a>
    2019 SHYF. Course Registration System
</footer>
</body>
</html>	
