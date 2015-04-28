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

    public function OpenChange($no,$term,$course_id,$teacher_id,$time,$address,$actual_num,$volume,$state){
        $OpenModel = M('open');
        $data['no']=$no;
        $data['term']=$term;
        $data['course_id']=$course_id;
        $data['teacher_id']=$teacher_id;
        $data['time']=$time;
        $data['address']=$address;
        $data['actual_num']=$actual_num;
        $data['volume']=$volume;
        $data['state']=$state;
        if($OpenModel->save($data)){
            $this->success("Change Success!",U('Root/Root'),2);
        }
        else{
            $this->error("Change Error!",U('Root/Root'),2);
        }
    }
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
            $this->success("Change Success!", U('Root/Root'), 2);
        } else {
            $a = session('faculty_id');
            $this->error("Change Error!", U("Root/FacultySelect?faculty_id=$a"), 2);
        }
    }
}