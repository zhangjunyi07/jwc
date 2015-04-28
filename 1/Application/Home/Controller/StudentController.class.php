<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/4/20
 * Time: 12:24
 */
namespace Home\Controller;
use Think\controller;

class StudentController extends Controller
{

    public function Student()
    {
        $this->display();
    }
    public function MyInfo()
    {
        $StudentModel = M('student');
        $data['id'] = session('id');
        $Result = $StudentModel->where($data)->select();
        $this->assign('Result',$Result);
        $this->display();
    }
    public function ChangePwd($old,$new1,$new2)
    {

    }

    public function ElectiveCourse($course_id,$teacher_id){
        $ElectiveModel = M('elective');
        $data['id'] = session('id');
        $data['course_id'] = $course_id;
    }
}