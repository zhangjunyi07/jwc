<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<table class="MyInfosearch">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Sex</th>
        <th>Birthday</th>
        <th>Native_Place</th>
        <th>Admission</th>
        <th>Phone</th>
        <th>Faculty_id</th>
    </tr>

    <?php if(is_array($Result)): $i = 0; $__LIST__ = $Result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($data["id"]); ?></td>
        <td><?php echo ($data["name"]); ?></td>
        <td><?php echo ($data["sex"]); ?></td>
        <td><?php echo ($data["birthday"]); ?></td>
        <td><?php echo ($data["native_place"]); ?></td>
        <td><?php echo ($data["admission"]); ?></td>
        <td><?php echo ($data["phone"]); ?></td>
        <td><?php echo ($data["faculty_id"]); ?></td>
         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
<div id="ChangePwdd"><a href="#">修改密码</a>
<!--<div id="ChangePwd" style="visibility: hidden">-->
    <!--<form action="<?php echo U('Sutdent/ChangePwd');?>">-->
        <!--<table>-->
            <!--<tr>-->
                <!--原密码<input type="password" name="old" >-->
            <!--</tr>-->
            <!--<tr>-->
                <!--新密码<input type="password" name="new1" >-->
            <!--</tr>-->
            <!--<tr>-->
                <!--再输一次<input type="password" name="new2" >-->
            <!--</tr>-->
            <!--<button type="submit">提交</button>-->
        <!--</table>-->
    <!--</form>-->
<!--</div>-->
</div>
<script type="text/javascript">

</script>
</body>
</html>