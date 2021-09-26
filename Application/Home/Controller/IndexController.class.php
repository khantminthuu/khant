<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
        $this->display('login');
    }

    public function hello()
    {
        if(! empty($_POST))
        {
            $arr['user_name'] = $_POST['user_name'];
            $arr['password'] = $_POST['password'];
            $checkUser = M('user')->where($arr)->find();

            if(!empty($checkUser))
            {
                $this->success('success Login', U('Product/showProduct'));
            }else{
                $this->error('login fail', U('Index/login'));
            }
        }

    }

}