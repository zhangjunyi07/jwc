<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="/jwc/Public/js/jquery.min.js"></script>
    <script src="/jwc/Public/js/bootstrap.min.js"></script>
    <script src="/jwc/Public/js/jquery.nivo.slider.pack.js"></script>
</head>
<body>
<a href="#"><div id="GetOpen">开课一览</div></a>
<a href="#"><div id="MyCourse">我的课程</div></a>
<a href="#"><div id="StudentList">学生名单</div></a>
<a href="#"><div id="OpenCourse">申请开课</div></a>
<div>
    <table class="search" id="resulttable"></table>
</div>
<div class="row" id="add" style="display:none;">
    <h3>新增<span style="font-size:20px"><a href="javascript:" id="closeadd">[关闭]</a></span></h3>
    <div id="addcontent">
    </div>
</div>
</body>
<script type="text/javascript">

    $(document).ready(function(){
        $("#GetOpen").click(function() {
            $.getJSON("<?php echo U('Get/GetOpen');?>", {}, function (data) {

                var openresult="<tr><th>no</th><th>term</th><th>course_id</th><th>teacher_id</th><th>time</th><th>address</th><th>actual_num</th><th>volumn</th></tr>";
                for(var i= 0;i<data.length;i++)
                {
                    openresult +="<tr><td>" + data[i].no + "</td><td>" + data[i].term + "</td><td>" + data[i].course_id + "</td><td>" + data[i].teacher_id + "</td><td>" + data[i].time + "</td><td>" + data[i].address + "</td><td>" + data[i].actual_num + "</td><td>" + data[i].volume + "</td></tr>"
                }
                $("#resulttable").html(openresult);
            });
        });

        $("#MyCourse").click(function()
                {

                    $.getJSON("<?php echo U('Teacher/MyCourse');?>",{},function(data)
                    {

                        if(data.length != 0)
                        {

                            var result = "<tr><th>no</th><th>term</th><th>course_id</th><th>teacher_id</th><th>time</th><th>address</th><th>actual_num</th><th>volumn</th></tr>";

                            for (var i = 0,j=1; i < data.length; i++,j++)
                            {
                                result +="<tr><td>" + j + "</td><td>" + data[i].term + "</td><td>" + data[i].course_id + "</td><td>" + data[i].teacher_id + "</td><td>" + data[i].time + "</td><td>" + data[i].address + "</td><td>" + data[i].actual_num + "</td><td>" + data[i].volume + "</td></tr>"
                            }
                        }

                        else
                        {
                            var result = "<tr><th>抱歉，本学期您没有开课</th></tr>"
                        }
                            $("#resulttable").html(result);
                    })
                })

        $("#StudentList").click(function()
                {
                    $.getJSON("<?php echo U('Teacher/MyCourse');?>",{},function(data)
                    {

                        if(data.length != 0)
                        {

                            var result = "<tr><th>no</th><th>term</th><th>course_id</th><th>teacher_id</th><th>time</th><th>address</th><th>actual_num</th><th>volumn</th></tr>";

                            for (var i = 0,j=1; i < data.length; i++,j++)
                            {
                                result +="<tr><td>" + j + "</td><td>" + data[i].term + "</td><td>" + data[i].course_id + "</td><td>" + data[i].teacher_id + "</td><td>" + data[i].time + "</td><td>" + data[i].address + "</td><td>" + data[i].actual_num + "</td><td>" + data[i].volume + "</td>"
                                +" "+"<td><form action=\"<?php echo U('Teacher/StudentList');?>\"><input type=\"text\" id=\"StudentList\" style=\"display:none\" name=\"id\" value="+data[i].course_id+"><button>学生名单</button></form></td></tr>";
                            }
                        }

                        else {
                            var result = "<tr><th>抱歉，本学期您没有开课</th></tr>"
                        }
                        $("#resulttable").html(result);
                    })

                })

        $("#OpenCourse").click(function(){
            console.log("123");
            $.getJSON("<?php echo U('Teacher/OpenCourse');?>", {}, function (data) {
                console.log("123");
                var year = new Date();
                var add = "<form name='OOpenCourse' action=\"<?php echo U('Add/AddOpen');?>\" onsubmit=\"return CourseInputCheck(this)\">" +
                     "课程名<select id=\"name\" name=\"course_id\">";
                    for(var i=0;i<data.length;i++)
                    {
                          add+="<option value="+data[i].course_id+">"+data[i].name+"</option>";
                     }
                    add+="</select><br><br>学期<select id=\"term\" name=\"term\">" ;
                for(var i=2012;i<year.getFullYear()+1;i++)
                {
                    add+="<option value="+i+"秋季学期"+">"+i+"秋季学期"+"</option>" +
                    "<option value="+i+"冬季学期"+">"+i+"冬季学期"+"</option>" +
                    "<option value="+i+"春季学期"+">"+i+"春季学期"+"</option>" +
                    "<option value="+i+"夏季学期"+">"+i+"夏季学期"+"</option>";
                }
                    "</select>"+
                     "</form>";
                $("#addcontent").html(add);
                $("#add").show(1000);
            })
        })
        $("#closeadd").click(function () {
            $("#add").hide(1000);
        });
    })

    </script>
</html>