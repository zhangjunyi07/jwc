?
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>wang yan da sha niu</title>
</head>

<body>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/4/15
 * Time: 10:32
 */
//$OpenModel = M('open_class');
//$searchResult = $OpenModel->where()->select();
$host = "localhost:3306";
$user = "root";
$pass = "";
$dbname = "jwc";
mysql_query("set names utf8 ");
$id = mysql_connect($host,$user,$pass);
mysql_select_db($dbname);
$sql = "select * from open ";
$result = mysql_query($sql);
if($result){
    echo "<table><tr><th>No</th><th>Term</th><th>Course_id</th><th>Teacher_id</th><th>Time</th><th>Address</th><th>Actual_Num</th><th>Volume</th></tr>";
    while($row = mysql_fetch_array($result))
    {
        echo "<tr><td>".$row['no']."</td><td>".$row['term']."</td><td>".$row['course_id']."</td></tr>";
    }
    echo"</table>";
}
?>


</body>


</html>

