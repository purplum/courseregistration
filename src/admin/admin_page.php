<?php
session_start();
$_SESSION['authuser'] = 1;

?>

<div style="text-align: center;">
    <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ADD8E6">
        <tr>
            <form name="form1" method="post" action="result1.php" onsubmit="return validate(this);">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#ADD8E6">
                        <tr>
                            <td colspan="3"><strong>
                                    <div style="text-align: center;"><h2>管理员登录</h2></div>
                                </strong></td>
                        </tr>
                        <tr>
                            <td>管理员名称:</td>
                            <td><input name="myusername" type="text" id="myusername"></td>
                        </tr>
                        <tr>
                            <td>密码:</td>
                            <td><input name="mypassword" type="password" id="mypassword"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" class="myButton" name="Submit" value="登录"></td>
            </form>

        </tr>
    </table>
    </td>
    </tr>
    </table>
</div>
<form name="form1" method="post" action="../../default.php" style="float:left">
    <input type="submit" class="myButton" name="Submit" value="学生登录">
</form>
<footer>
    <a href="../../default.php" style="color: white;">Back to home</a>
    2019 Allen Yin. Course Registration System
</footer>
<html>
<head>
    <script type="text/javascript">
        function validate(form) {
            var userName = form.myusername.value;
            var password = form.mypassword.value;

            if (userName.length === 0) {
                alert("You must enter a username.");
                return false;
            }

            if (password.length === 0) {
                alert("You must enter a password.");
                return false;
            }

            return true;
        }
    </script>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<div id="div1"></div>
</body>
</html>	
