<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>教务管理系统</title>
    <link href="/jwc/Public/css/login.css" rel="stylesheet" type="text/css" />
    <script src="/jwc/Public/js/jquery.min.js"></script>
    <script src="/jwc/Public/js/bootstrap.min.js"></script>
    <script src="/jwc/Public/js/jquery.nivo.slider.pack.js"></script>

</head>

<body>
<div id="header"><h3>教务管理系统</h3>
    <form name="Login" action="<?php echo U('Login/Login');?>"  onSubmit="return InputCheck(this)">
        用户名  <input type="text" id="id" name="id">
        密码  <input type="password" id="password" name="password">
        <button type="submit" name="submit">Login</button>
</div>
<script type="text/javascript">
        function InputCheck(Login){
            if(Login.id.value == "")
            {
                alert("用户名不能为空！");
                Login.id.focus();
                return (false);
            }
            if(Login.password.value == "")
            {
                alert("密码不能为空！");
                Login.password.focus();
                return (false);
            }
        }
</script>
</body>

</html>