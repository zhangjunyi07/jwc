<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/4/23
 * Time: 14:35
 */
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller
{

    public function OpenSearch($no)
    {
    $Model = M('open');
    $data['no'] = $no;
    $result = $Model->where($data)->select();
    echo json_encode($result);
    }

    public function StudentSearch($id)
    {
        $Model = M('student');
        $data['id'] = $id;
        $result = $Model->where($data)->select();
        echo json_encode($result);
    }
    public function TermSearch($term_name,$turns)
    {
        $Model = M('term');
        $data['term_name'] = $term_name;
        $data['turns'] = $turns;
        $result = $Model->where($data)->select();
        echo json_encode($result);
    }
    public function SelectSearch($course_id,$course_name,$teacher_id,$name,$time,$address,$point)
    {
        if($course_id)
        {
            $data['course_id']= $course_id;
        }
        if($course_name)
        {
            $data['course_name']= $course_name;
        }
        if($teacher_id)
        {
            $data['teacher_id']= $teacher_id;
        }
        if($name)
        {
            $data['name']= $name;
        }
        if($time)
        {
            $data['time']= $time;
        }
        if($address)
        {
            $data['address']= $address;
        }
        if($point)
        {
            $data['point']= $point;
        }
        $data['state'] = '0';
        $Model = M();
        $result=$Model->table(array('open'=>'open','teacher'=>'teacher','course'=>'course'))->where('open.teacher_id=teacher.teacher_id and
        open.course_id=course.course_id')->field('open.course_id,course.course_name,open.teacher_id,teacher.name,open.time,open.address,open.actual_num,open.volume')->where("open.course_id = $course_id")->select();
        echo json_encode($result);
    }

}