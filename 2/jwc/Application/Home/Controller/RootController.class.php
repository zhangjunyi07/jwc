<?php
namespace Home\Controller;
use Think\Controller;
class RootController extends Controller
{

    public function Root()
    {
        $this->display();
    }


    public function FacultySelect($faculty_id){
        $facultyModel = M('faculty');
        $data['faculty_id']=$faculty_id;
        $searchResult = $facultyModel->where($data)->select();
        session('faculty_id',$faculty_id);
        $this->assign('searchResult',$searchResult);
        $this->display();
    }


}