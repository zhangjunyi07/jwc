<?php
namespace Home\Controller;
use Think\controller;

class LoginController extends Controller {

    public function login($id,$password){
        $IdModel = M('admin');
        $data['id']=$id;
        $data['password'] = $password;
        if($IdModel->where($data)->find()){
            session('id',$id);
           $this->success("Welcome!$id",U('Root/Root'),2);
        }
        else{
            $StudentModel = M('student');
            if($StudentModel->where($data)->find()){
                session('id',$id);
                    $this->success("Welcome!$id",U('Student/Student'),2);
            }
            else{
                $TeacherModel = M('teacher');
                $data['teacher_id'] = $id;
                $data['password'] = $password;
                if($TeacherModel->where($data)->find()) {
                    session('id',$id);
                    $this->success('Welcome!', U('Teacher/Teacher'), 3);
                    }
                else
                    $this->error('Wrong id or password!',U('Index/Index'),2);
                }
            }
        }
    }