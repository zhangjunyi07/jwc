<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/4/27
 * Time: 12:52
 */
/**
 * $_GET ���� ���url��������
 * @author Administrator
 *
 */
class GetcodingBehavior extends Behavior{
    public function run(&$params) {

        foreach ($_GET as $k=>$v){
            if(!is_array($v)){
                if (!mb_check_encoding($v, 'utf-8')){
                    $_GET[$k] = iconv('gbk', 'utf-8', $v);
                }
            }else{
                foreach ($_GET['_URL_'] as $key=>$value){
                    if (!mb_check_encoding($value, 'utf-8')){
                        $_GET['_URL_'][$key] = iconv('gbk', 'utf-8', $value);
                    }
                }
            }
        }

    }
}