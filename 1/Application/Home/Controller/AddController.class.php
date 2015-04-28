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
}