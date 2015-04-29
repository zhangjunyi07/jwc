<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/4/23
 * Time: 20:36
 */
namespace Home\Controller;
use Think\Controller;
class AddController extends Controller
{

    public function FacultyAdd($faculty_id,$faculty_name,$department_name,$address,$phone){
        $facultyModel = M('faculty');
        $data['faculty_id']=$faculty_id;
        $data['faculty_name']=$faculty_name;
        $data['department_name']=$department_name;
        $data['address']=$address;
        $data['phone']=$phone;
        if($facultyModel->add($data)){
            echo '<script>alert("Add Success!");history.go(-2);</script>';
        }
        else{
            echo '<script>alert("Add Success!");history.go(-1);</script>';
        }
    }
    public function AddOpen($course_id,$term,$time,$volume)
    {
        $Model=M('open');
        $data['course_id']=$course_id;
        $data['term']=$term;
        $data['time']=$time;
        $data['volume']=$volume;
        $O_no=$Model->order('no desc')->select();
        $data['no']=$O_no[0]['no']+1;
        $t_id=session('id');
        $data['teacher_id']=$t_id;
        $data['state']='1';
        if($Model->add($data))
        {
            echo '<script>alert("Add Success!");history.go(-2);</script>';
        }
        else
        {
            echo '<script>alert("Add fail!");history.go(-1);</script>';
        }
    }
}