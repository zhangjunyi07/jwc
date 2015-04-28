<?php
namespace Home\Controller;
use Think\Controller;
class TeacherController extends Controller
{

    public function Teacher()
    {
        $this->display();
    }

    public function MyCourse()
    {
        $aa = M('open');
        $data['teacher_id'] = session('id');
        $result = $aa->where($data)->select();
        echo json_encode($result);
    }

    public function StudentList($course_id)
    {
        $StudentList=M('elective');
        $data['course_id']=$course_id;
        $data['teacher_id']=session('id');
        $result=$StudentList->where($data)->select();
        $this->assign('result',$result);
        $this->display();
    }


    public function OpenCourse(){
        $CModel = M('course');
        $name = $CModel->where()->select();
        echo json_encode($name);
    }
}
