<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/4/23
 * Time: 20:30
 */
namespace Home\Controller;
use Think\Controller;
class GetController extends Controller
{

    public function GetOpen()
    {
        $OpenModel = M('open');
        $searchResult = $OpenModel->where('state = 0')->select();
        echo json_encode($searchResult);
    }
    public function GetCheckOpen()
    {
        $OpenModel = M('open');
        $searchResult = $OpenModel->where('state = 1')->select();
        echo json_encode($searchResult);
    }
    public function GetStudent()
    {
        $StudentModel = M('Student');
        $searchResult = $StudentModel->where()->select();
        echo json_encode($searchResult);
    }
    public function GetFaculty()
    {
        $FacultyModel = M('Faculty');
        $searchResult = $FacultyModel->where()->select();
        echo json_encode($searchResult);
    }
    public function GetCourse()
    {
        $CourseModel = M('Course');
        $searchResult = $CourseModel->where()->select();
        echo json_encode($searchResult);
    }

}