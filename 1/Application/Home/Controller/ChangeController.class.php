<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/4/23
 * Time: 20:35
 */
namespace Home\Controller;
use Think\Controller;
class ChangeController extends Controller
{

//    public function OpenChange($no,$term,$course_id,$teacher_id,$time,$address,$actual_num,$volume,$state){
//        $OpenModel = M('open');
//        $data['no']=$no;
//        $data['term']=$term;
//        $data['course_id']=$course_id;
//        $data['teacher_id']=$teacher_id;
//        $data['time']=$time;
//        $data['address']=$address;
//        $data['actual_num']=$actual_num;
//        $data['volume']=$volume;
//        $data['state']=$state;
//        if($OpenModel->save($data)){
//            $this->success("Change Success!",U('Root/Root'),2);
//        }
//        else{
//            $this->error("Change Error!",U('Root/Root'),2);
//        }
//    }
    public function OpenCheckFail($no)
    {
        $OpenModel = M('open');
        $data['no'] = $no;
        $data['state'] = 2 ;
        if($OpenModel->save($data))
        {
            $this->success("Check Fail Success!",U('Root/Root'),2);
        }
        else
        {
            $this->error("Check Fail Fail!",U('Root/Root'),2);
        }
    }
    public function FacultyChange($faculty_id,$faculty_name,$department_name,$address,$phone)
    {
        $facultyModel = M('faculty');
        $data['faculty_id'] = $faculty_id;
        $data['faculty_name'] = $faculty_name;
        $data['department_name'] = $department_name;
        $data['address'] = $address;
        $data['phone'] = $phone;
        if ($facultyModel->save($data)) {
            echo '<script>alert("Change Success!");history.go(-1);</script>';
        } else {
            $a = session('faculty_id');
            echo '<script>alert("Change Error!");history.go(-1);</script>';
        }
    }
    public function StudentChange($id,$name,$sex,$birthday,$native_place,$admission,$phone,$faculty_id)
    {
        $Model = M('student');
        $data['id'] = $id;
        $data['name'] = $name;
        $data['sex'] = $sex;
        $data['birthday'] = $birthday;
        $data['admission'] = $admission;
        $data['native_place'] = $native_place;
        $data['phone'] = $phone;
        $data['faculty_id'] = $faculty_id;
        if($Model->where($data)->find())
        {
            echo '<script>alert("Nothing changed!");history.go(-1);</script>';
        }
        if ($Model->save($data)) {
            echo '<script>alert("Change Success!");history.go(-1);</script>';
        } else {
            echo '<script>alert("Change Error!");history.go(-1);</script>';
        }
    }
    public function TermChange($term_name,$turns,$start,$end){
        $Model = M('term');
        $data['term_name']=$term_name;
        $data['turns']=$turns;
        $data['start']=$start;
        $data['end']=$end;
        if($Model->where($data)->find())
        {
            echo '<script>alert("No Term changed!");history.go(-1);</script>';
        }
        if($Model->save($data))
        {
            echo '<script>alert("Change Successs!");history.go(-2);</script>';
        }
        else
        {
            echo '<script>alert("Change Error!");history.go(-1);</script>';
        }
    }
    public function ChangePwd($new_pwd)
    {
        $TModel=M('teacher');
        $t_id=session('id');
        $data['teacher_id']=$t_id;
        $data['password']=$new_pwd;
        if($TModel->save($data))
        {
            echo '<script>alert("Change Success!");history.go(-1);</script>';
        }
        else
        {
            echo '<script>alert("Change Error!");history.go(-1);</script>';
        }

    }
}