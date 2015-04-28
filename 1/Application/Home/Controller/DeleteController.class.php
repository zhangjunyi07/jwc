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
            echo '<script>alert("Delete success!");history.go(-1);</script>';
        }
        else{
            echo '<script>alert("Delete Error!");history.go(-1);</script>';
        }
    }

    public function StudentDelete($id){
        $StudentModel = M('Student');
        $data['id']=$id;
        if( $StudentModel->where($data)->delete()){
            echo '<script>alert("Delete success!");history.go(-1);</script>';
        }
        else{
            echo '<script>alert("Delete Error!");history.go(-1);</script>';
        }

    }

    public function FacultyDelete($faculty_id){
        $FacultyModel = M('faculty');
        $data['faculty_id']=$faculty_id;
        $SModel = M('student');
        $TModel = M('teacher');

        if($SModel->where($data)->find())
            echo '<script>alert("Delete Error!student belongs to it");history.go(-1);</script>';
        else
            if($TModel->where($data)->find())
                echo '<script>alert("Delete Error!teacher belongs to it");history.go(-1);</script>';
            else
            {
                $FacultyModel->where($data)->delete();
                echo '<script>alert("Delete success!");history.go(-1);</script>';
            }
    }
    public function CourseDelete($course_id){
        $CourseModel = M('course');
        $data['course_id']=$course_id;
        $OModel = M('open');
        if($OModel->where($data)->find())
            echo '<script>alert("Delete Error!it found");history.go(-1);</script>';
        else
            {
                $CourseModel->where($data)->delete();
                echo '<script>alert("Delete success!");history.go(-1);</script>';
            }
    }
}
