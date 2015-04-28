<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/4/23
 * Time: 20:33
 */
namespace Home\Controller;
use Think\Controller;
class DeleteController extends Controller{


    public function OpenDelete($no){
        $OpenModel = M('open');
        $data['no']=$no;
        if($OpenModel->where($data)->delete()){
            $this->success("Delete Success!",U('Root/Root'),2);
        }
        else{
            $this->error("Delete Error!",U('Root/Root'),2);
        }
    }

    public function StudentDelete($id){
        $StudentModel = M('Student');
        $data['id']=$id;
        if( $StudentModel->where($data)->delete()){
            $this->success("Delete Success!",U('Root/root'),2);
        }
        else{
            $this->error("Delete Error!",U('Root/root'),2);
        }

    }

    public function FacultyDelete($faculty_id){
        $FacultyModel = M('faculty');
        $data['faculty_id']=$faculty_id;
        $SModel = M('student');
        $TModel = M('teacher');

        if($SModel->where($data)->find())
            echo '<script>alert("Delete Error!啦啦")</script>';
        else
            if($TModel->where($data)->find())
                $this->error("Delete Error!有教师存在于该学院",U('Root/Root'),2);
            else
            {
                $FacultyModel->where($data)->delete();
                $this->success("Delete Success!",U('Root/Root'),2);
            }
    }
    public function CourseDelete($course_id){
        $CourseModel = M('course');
        $data['course_id']=$course_id;
        $OModel = M('open');
        if($OModel->where($data)->find())
            $this->error("Delete Error!该课程已开课",U('Root/Root'),2);
        else
            {
                $CourseModel->where($data)->delete();
                $this->success("Delete Success!",U('Root/Root'),2);
            }
    }
}
