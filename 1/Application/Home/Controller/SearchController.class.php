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
        echo $course_id,$course_name,$teacher_id,$name,$time,$address,$point;
    }

}