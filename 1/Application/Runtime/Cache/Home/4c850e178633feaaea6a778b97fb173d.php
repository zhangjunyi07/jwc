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
<body onload="time()">
<div id="time"></div>
<a href="#"><div id="GetOpen">开课一览</div></a>
<a href="#"><div id="GetCheckOpen">代审课程</div></a>
<a href="#"><div id="GetStudent">学生一览</div></a>
<a href="#"><div id="GetFaculty">院系一览</div></a>
<a href="#"><div id="GetCourse">课程一览</div></a>
<a href='#'><div id="AddFaculty">新增学院</div></a>
<a href="#"><div id="GetTerm">选课时间一览</div></a>
<a href="#"><div id="SetElectiveTime">设置选课时间</div></a>
<div class="row" id="add" style="display:none;">
    <h3>新增<span style="font-size:20px"><a href="javascript:" id="closeadd">[关闭]</a></span></h3>
    <div id="addcontent">
    </div>
</div>
<div class="row" id="change" style="display:none;">
    <h3>修改<span style="font-size:20px"><a href="javascript:" id="closechange">[关闭]</a></span></h3>
    <div id="changecontent">
    </div>
</div>
<div class="row" id="search" style="display:none;">
    <h3>搜索结果<span style="font-size:20px"><a href="javascript:" id="closesearch">[关闭]</a></span></h3>
    <div>
        <table class="search" id="searchcontent"></table>
    </div>
</div>
</body>
<script type="text/javascript">
    function time(){
        var now= new Date();
        console.log(now);
        var year=now.getFullYear();
        var month=now.getMonth();
        var date=now.getDate();
        document.getElementById("time").innerHTML="今天是："+year+"年"+(month+1)+"月"+date+"日";};
    function FacultyInputCheck(AAddFaculty) {
//        console.log("lalala");
        if (fucChecknum(AAddFaculty.faculty_id.value, 4) == 0) {
            alert("院系号必须为4位数字！");
            AAddFaculty.faculty_id.focus();
            return (false);
        }
        if (AAddFaculty.faculty_name.value.length == 0 || AAddFaculty.faculty_name.value.length > 15) {
            alert("学院名必须>0,<15！");
            AAddFaculty.faculty_name.focus();
            return (false);
        }
        if (AAddFaculty.department_name.value.length == 0 || AAddFaculty.department_name.value.length > 15) {
            alert("系名必须>0,<15！");
            AAddFaculty.department_name.focus();
            return (false);
        }
        if (AAddFaculty.address.value.length == 0 || AAddFaculty.address.value.length > 25) {
            alert("dizhi必须>0,<25！");
            AAddFaculty.address.focus();
            return (false);
        }
        if (fucChecknum(AAddFaculty.phone.value, 11) == 0) {
            alert("dianhua必须为11位数字！");
            AAddFaculty.phone.focus();
            return (false);
        }
    }
    function fucChecknum(num, len) {
        var i, j, strTemp;
        strTemp = "0123456789";
        if (num.length != len)
            return 0
        for (i = 0; i < num.length; i++) {
            j = strTemp.indexOf(num.charAt(i));
            if (j == -1) {
                return 0;
            }
        }
        return 1;
    }
    function OpenCheck21(no) {
    console.log(no);
        $.getJSON("<?php echo U('Search/OpenSearch');?>", {'no':no} , function (date) {
            console.log("12111sdfasfd");
            var result = "<table><form name='CheckOpen' action=\"<?php echo U('Change/OpenChange');?>\">" +
                    "<td><input type=\"text\" onfocus=\"this.blur()\" name=\"no\" value=" + date[0].no + "></td>" +
                    "<td><input type=\"text\" onfocus=\"this.blur()\" name=\"term\" value=" + date[0].term + "></td>" +
                    "<td><input type=\"text\" onfocus=\"this.blur()\" name=\"course_id\" value=" + date[0].course_id + "></td>" +
                    "<td><input type=\"text\" onfocus=\"this.blur()\" name=\"teacher_id\" value=" + date[0].teacher_id + "></td>" +
                    "<td><input type=\"text\" onfocus=\"this.blur()\" name=\"time\" value=" + date[0].time + "></td>" +
                    "<td><input type=\"text\" name=\"address\" value=" + date[0].address + "></td>" +
                    "<td><input type=\"text\" onfocus=\"this.blur()\" name=\"actual_num\" value=" + date[0].actual_num + "></td>" +
                    " <td><input type=\"text\" onfocus=\"this.blur()\" name=\"volume\" value=" + date[0].volume + "></td>" +
                    " <td><input type=\"text\" style=\"display: none\" name=\"state\" value=" + 0 + "></td>" +
                    "<button >保存</button></form></table>";
            $("#changecontent").html(result);
            $("#change").show(1000);
        }, 'html');

    }
    function TermChange1(term_name,turns){
        console.log("termchange");
        $.getJSON("<?php echo U('Search/TermSearch');?>",{'term_name':term_name,'turns':turns},function(data){
            var result = "<table><form name='changeterm' action=\"<?php echo U('Change/TermChange');?>\">" +
                    "<tr><td><input type=\"text\" onfocus=\"this.blur()\" name=\"term_name\" value=" + data[0].term_name + "></td>" +
                    "<td><input type=\"text\" onfocus=\"this.blur()\" name=\"turns\" value=" + data[0].turns + "></td>" +
                    "<td><input type=\"text\"  name=\"start\" value=" + data[0].start + "></td>" +
                    "<td><input type=\"text\"  name=\"end\" value=" + data[0].end + "></td></tr>" +
                            "<tr><td><button >保存</button></td></tr></form></table>";
            $("#changecontent").html(result);
            $("#change").show(1000);
        });
    };
    function Delete(){
        if(confirm("是否确认删除？"))
        {
            return true;
        }
        else
        {
            return false;
        }
    };
    $(document).ready(function() {
        $("#GetTerm").click(function(){
            $.getJSON("<?php echo U('Get/GetTerm');?>", {}, function (data) {
                console.log("getterm");
                var result = "<tr><th>Term_Name</th><th>Turns</th><th>start</th><th>end</th></tr>";

                for (var i = 0; i < data.length; i++) {
                    result += "<tr><td>" + data[i].term_name +
                    "</td><td>" + data[i].turns +
                    "</td><td>" + data[i].start +
                    "</td><td>" + data[i].end +"</td>"+
                    "<td><button onclick=TermChange1('"+data[i].term_name+"','"+data[i].turns+"')>修改</button></td></tr>";
                }
                $("#searchcontent").html(result);
                $("#search").show(1000);
            });
        });
        $("#SetElectiveTime").click(function(){
            console.log("settime");
            var nnn = new Date();
            var set="<form><table><tr><td>第<select id=\"term\" name=\"term\">" ;
            for(var i=2012;i<nnn.getFullYear()+1;i++)
            {
                set+="<option value="+i+"秋季学期"+">"+i+"秋季学期"+"</option>" +
                "<option value="+i+"冬季学期"+">"+i+"冬季学期"+"</option>" +
                "<option value="+i+"春季学期"+">"+i+"春季学期"+"</option>" +
                "<option value="+i+"夏季学期"+">"+i+"夏季学期"+"</option>";
            }
           set+= "</select>学期</td><td>第<select id=\"turns\" name=\"turns\"><option value=\"1\">1</option><option value=\"2\">2</option></select>轮选课</td><td><button>查询</button></td></tr>" +
           "</table></form>"
            $("#addcontent").html(set);
            $("#add").show(1000);
        });
        $("#GetCheckOpen").click(function () {
            console.log("CheckOpen");
            $.getJSON("<?php echo U('Get/GetCheckOpen');?>", {}, function (data) {
//                console.log("GetCheckOpen");
                var openresult = "<tr><th>No</th><th>Term</th><th>Course_id</th><th>Teacher_id</th><th>Time</th><th>Address</th><th>Actual_Num</th><th>Volume</th></tr>";

                for (var i = 0; i < data.length; i++) {
                    openresult += "<tr><td>" + data[i].no +
                    "</td><td>" + data[i].term +
                    "</td><td>" + data[i].course_id +
                    "</td><td>" + data[i].teacher_id +
                    "</td><td>" + data[i].time +
                    "</td><td>" + data[i].address +
                    "</td><td>" + data[i].actual_num +
                    "</td><td>" + data[i].volume +
                    "</td><td><button onclick=OpenCheck21("+data[i].no+")>审核</button></td>" +
                    "<td><form action=\"<?php echo U('Change/OpenCheckFail');?>\"><input type=\"text\" style=\"display: none\"  name=\"no\" value="+data[i].no+"><button>否决</button></form></td></tr>";
                }
                $("#searchcontent").html(openresult);
                $("#search").show(1000);
            });
        });
        $("#GetOpen").click(function () {

            $.getJSON("<?php echo U('Get/GetOpen');?>", {}, function (data) {
//                console.log("lalala");
                var openresult = "<tr><th>No</th><th>Term</th><th>Course_id</th><th>Teacher_id</th><th>Time</th><th>Address</th><th>Actual_Num</th><th>Volume</th></tr>";

                for (var i = 0; i < data.length; i++) {
                    openresult += "<tr><td>" + data[i].no + "</td><td>" + data[i].term + "</td><td>" + data[i].course_id + "</td><td>" + data[i].teacher_id + "</td><td>" + data[i].time + "</td><td>" + data[i].address + "</td><td>" + data[i].actual_num + "</td><td>" + data[i].volume + "</td>" +
                    "<td><form action=\"<?php echo U('Delete/OpenDelete');?>\"><input type=\"text\" style=\"display: none\"  name=\"no\" value="+data[i].no+"><button >删除</button></form></td></tr>";
                }
                $("#searchcontent").html(openresult);
                $("#search").show(1000);
            });
        });
        $("#GetFaculty").click(function () {
            $.getJSON("<?php echo U('Get/GetFaculty');?>", {}, function (data) {
                var facultyresult = "<tr><th>faculty_id</th><th>faculty_name</th><th>department_name</th><th>address</th><th>phone</th></tr>";
                for (var i = 0; i < data.length; i++) {
                    facultyresult += "<tr><td>" + data[i].faculty_id + "</td><td>" + data[i].faculty_name + "</td><td>" + data[i].department_name + "</td><td>" + data[i].address + "</td><td>" + data[i].phone + "</td>" +
                   // "<td><form action=\"<?php echo U('Root/FacultySelect');?>\"><input type=\"text\" id=\"facultyselect\" style=\"display: none\"  name=\"faculty_id\" value="+data[i].faculty_id+"><button>修改</button></form></td> " +
                    "<td><form action=\"<?php echo U('Delete/FacultyDelete');?>\"><input type=\"text\" id=\"facultydelete\" style=\"display: none\"  name=\"faculty_id\" value="+data[i].faculty_id+"><button>删除</button></form></td>" +
                    "</tr>";
                }
                $("#searchcontent").html(facultyresult);
                $("#search").show(1000);
            });
        });
        $("#GetCourse").click(function () {
            $.getJSON("<?php echo U('Get/GetCourse');?>", {}, function (data) {
                var facultyresult = "<tr><th>course_id</th><th>name</th><th>point</th></tr>";
                for (var i = 0; i < data.length; i++) {
                    facultyresult += "<tr><td>" + data[i].course_id + "</td><td>" + data[i].name + "</td><td>" + data[i].point + "</td>" +
//                    "<td><form action=\"<?php echo U('Root/FacultySelect');?>\"><input type=\"text\" id=\"facultyselect\" style=\"display: none\"  name=\"faculty_id\" value="+data[i].faculty_id+"><button>修改</button></form></td> " +
                    "<td><form action=\"<?php echo U('Delete/CourseDelete');?>\"><input type=\"text\" style=\"display: none\"  name=\"course_id\" value="+data[i].course_id+"><button>删除</button></form></td>" +
                    "</tr>";
                }
                $("#searchcontent").html(facultyresult);
                $("#search").show(1000);
            });
        });
        $("#GetStudent").click(function () {

            $.getJSON("<?php echo U('Get/GetStudent');?>", {}, function (data) {
                var result = "<tr><th>id</th><th>name</th><th>sex</th><th>birthday</th><th>native_place</th><th>admission</th><th>phone</th><th>faculty_id</th><th>password</th></tr>";

                for (var i = 0; i < data.length; i++) {
                    result += "<tr><td>" + data[i].id + "</td><td>" + data[i].name + "</td><td>" + data[i].sex + "</td><td>" + data[i].birthday + "</td><td>" + data[i].native_place + "</td><td>" + data[i].admission + "</td><td>" + data[i].phone + "</td><td>" + data[i].faculty_id + "</td><td>" + data[i].password + "</td>" +
                    " " +
                    "<td><form action=\"<?php echo U('Delete/StudentDelete');?>\"><input type=\"text\" style=\"display: none\"  name=\"id\" value="+data[i].id+"><button onclick='return Delete();'>删除</button></form></td></tr>";
                }
                $("#searchcontent").html(result);
                $("#search").show(1000);
            });
        });
        $("#AddFaculty").click(function(){
            var add = "<form name='AAddFaculty' action=\"<?php echo U('Add/FacultyAdd');?>\" onsubmit=\"return FacultyInputCheck(this)\">" +
                       "院系号<input type=\"text\" id=\"faculty_id\" name=\"faculty_id\">4位数字<br/>" +
                       "学院名<input type=\"text\" id=\"faculty_name\" name=\"faculty_name\">不超过15个汉字<br/>" +
                       "系   名<input type=\"text\" id=\"department_name\" name=\"department_name\">不超过15个汉字<br/>" +
                       "地   址<input type=\"text\" id=\"address\" name=\"address\">不超过25个汉字长度<br/>" +
                       "电   话<input type=\"text\" id=\"phone\" name=\"phone\">11位数字<br/>" +
                       "<button type=\"submit\" name=\"submit\">保存</button></form>";
            $("#addcontent").html(add);
            $("#add").show(1000);
//            console.log("lalala");
        })
        $("#closesearch").click(function () {
            $("#search").hide(1000);
        });
        $("#closeadd").click(function () {
            $("#add").hide(1000);
        });
        $("#closechange").click(function () {
            $("#change").hide(1000);
        });
    });

</script>

</html>