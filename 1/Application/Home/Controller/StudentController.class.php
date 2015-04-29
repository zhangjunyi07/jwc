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
        $a = session('id');
        $data['id'] = $a;
        $Result = $StudentModel->where($data)->select();
        echo json_encode($Result);
    }

    public function ChangePwd($old,$new1,$new2)
    {

    }

    public function ElectiveCourseTurns1($course_id,$teacher_id){
        $EModel = M('elective');
        $SModel = M('student');
        $CModel = M('course');
        $date['course_id'] = $course_id;
        $date['teacher_id'] = $teacher_id;
        $a = session('id');
        //Ñ¡¿ÎÊ±¼ä³åÍ»


        $S = $SModel->where('id=$a')->select();
        $C = $CModel->where('course_id=$course_id')->select();
        if($S['C_Point']+$C['point']>35)
        {
            echo '<script>alert("More than you can elective!");history.go(-1);</script>';
        }

    }
}