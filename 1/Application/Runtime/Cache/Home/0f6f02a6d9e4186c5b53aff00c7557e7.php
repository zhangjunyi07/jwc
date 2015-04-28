<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="/1/Public/js/jquery.min.js"></script>
    <script src="/1/Public/js/bootstrap.min.js"></script>
    <script src="/1/Public/js/jquery.nivo.slider.pack.js"></script>
    <script src="/1/Public/js/getaddclose.js"></script>
</head>
<body>
<a href="#"><div id="MyInfo">查询个人信息</div></a>
<div class="row" id="me" style="display:none;">
    <h3>个人信息<span style="font-size:20px"><a href="javascript:" id="closeme">[关闭]</a></span></h3>
    <div>
        <table class="me" id="mecontent"></table>
    </div>
</div>
<div class="row" id="change" style="display:none;">
    <h3>个人信息<span style="font-size:20px"><a href="javascript:" id="closechange">[关闭]</a></span></h3>
    <div>
        <div id="changecontent"></div>
    </div>
</div>
</body>
<script type="text/javascript">
    function changemeinfoinputcheck(changemeinfo) {
    if (changemeinfo.name.value.length == 0) {
        alert("name 不能为空！");
        changemeinfo.name.focus();
        return (false);
    }
    if (fucChecknum(changemeinfo.birthday.value, 8) == 0) {
        alert("生日必须为8位数字！");
        changemeinfo.birthday.focus();
        return (false);
    }
        var year = new Date;
        var yyear = changemeinfo.birthday.value.substr(0,4);
        var mmonth = changemeinfo.birthday.value.substr(4,2);
        var dday = changemeinfo.birthday.value.substr(6,2);
        var yyyear = parseInt(yyear);
        var month = parseInt(mmonth);
        var day = parseInt(dday);
        console.log(yyyear);
        console.log(month);
        console.log(day);
        if(yyyear>=year.getFullYear()-14 || month > 12 || day>31)
        {
            alert("birthday格式错误！");
            changemeinfo.birthday.focus();
            return (false);
        }
        if (fucChecknum(changemeinfo.phone.value, 11) == 0) {
            alert("phone必须为11位数字！");
            changemeinfo.phone.focus();
            return (false);
        }
    }
    function fucChecknum(num, len) {
        var i, j, strTemp;
        strTemp = "0123456789";
        if (num.length != len)
            return 0;
        for (i = 0; i < num.length; i++) {
            j = strTemp.indexOf(num.charAt(i));
            if (j == -1) {
                return 0;
            }
        }
        return 1;
    }
    function ChangeMe23(id){
        $.getJSON("<?php echo U('Search/StudentSearch');?>",{'id':id},function(data) {
            console.log("changeme");
            var my = "<form name=\"changemeinfo\" action=\"<?php echo U('Change/StudentChange');?>\" onsubmit=\"return changemeinfoinputcheck(this)\"><table><tr><th>Id</th><th>Name</th><th>Sex</th><th>Birthday</th><th>Native_Place</th><th>Admission</th><th>Phone</th><th>Faculty_id</th></tr>" +
                    "<tr><td><input name=\"id\"  onfocus=\"this.blur()\" value= " + data[0].id + "></td>" +
                    "<td><input name=\"name\" value=" + data[0].name + "></td>" +
                    "<td><select id=\"sex\" name=\"sex\"><option value='男'>男</option><option value='女'>女</option></td>" +
                    "<td><input name=\"birthday\" value=" + data[0].birthday + "></td>" +
                    "<td><input name=\"native_place\" value=" + data[0].native_place + "></td>" +
                    "<td><input name=\"admission\" onfocus=\"this.blur()\" value=" + data[0].admission + "></td>" +
                    "<td><input name=\"phone\" value=" + data[0].phone + "></td>" +
                    "<td><input name=\"faculty_id\" onfocus=\"this.blur()\" value=" + data[0].faculty_id + "></td></tr></table>" +
                    "<td><button>确认修改</button></td></form>";
            $("#changecontent").html(my);
            $("#me").hide(1000);
            $("#change").show(1000);
        });
    }
$(document).ready(function() {
    console.log("ready");
    $("#MyInfo").click(function () {
        console.log("myinfo");
         $.getJSON("<?php echo U('Student/MyInfo');?>",{},function(data){
              var my="<tr><th>Id</th><th>Name</th><th>Sex</th><th>Birthday</th><th>Native_Place</th><th>Admission</th><th>Phone</th><th>Faculty_id</th></tr>"+
                      "<tr><td>" + data[0].id + "</td><td>" + data[0].name + "</td><td>" + data[0].sex + "</td><td>" + data[0].birthday + "</td><td>" + data[0].native_place + "</td><td>" + data[0].admission + "</td><td>" + data[0].phone + "</td><td>" + data[0].faculty_id + "</td>" +
                      "<td><button onclick=ChangeMe23("+data[0].id+")>修改个人信息</button></td></tr>";
             $("#mecontent").html(my);
             $("#me").show(1000);
         });
    });
    $("#closeme").click(function ()
    {
        $("#me").hide(1000);
    })
});
</script>
</html>