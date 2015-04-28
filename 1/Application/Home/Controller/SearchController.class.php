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

}