<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller
{
    public function showProduct()
    {
        $arr = [
            "<i class='fa fa-times-circle'></i>",
            "<i class='fa fa-check-square'></i>",
        ];

        $data = M('product')->select();

        $this->assign('status',$arr);

        $this->assign('data',$data);

        $this->display();
    }

    public function edit()
    {
        $data = M('product')->where(['id'=>$_GET['id']])->find();
        $image = M('product_photo')->where(['product_id'=>$data['id']])->find();

        $this->assign('data',$data);
        $this->assign('image',$image);
        $this->display();
    }

    public function editData()
    {
        $data = $_POST;
        $data = array_filter($data);
        $arr = $data;

        unset($arr['id']);
        unset($arr['pic_url']);
        if(!empty($data['pic_url'])) {
            $this->editPhoto($data);
        }

        if(!empty($arr))
        {
            if($data['status'] === "on")
            {
                $data['status'] = 1;
            }
            
            if($data['status'] === "NO")
            {
                $data['status'] = 0;
            }
            if(!empty($data['weight']))
            {
                $data = $this->calculate($data);
            }
            $status = M('product')->save($data);
        }

        $url = U('showProduct');

        header('Location: '.$url);
    }

    public function editPhoto($data )
    {
        $arr['product_id'] = $data['id'];
        $arr['pic_url'] = $data['pic_url'];

        $status = M('product_photo')->where(['product_id'=>$data['id']])->find();

        if(empty($status))
        {
            M('product_photo')->add($arr);
        }else{
            $arr['id'] = $status['id'];
            M('product_photo')->save($arr);

        }
    }

    public function delete()
    {
        $arr = json_decode(file_get_contents("php://input"));
        $id = $arr->id;
        $status = M('product')->where(['id'=>$id])->delete();
            $status    = !is_numeric($status) ? 0 : 1;
        $message   = !is_numeric($status) ? '失败' : '成功';
        $this->ajaxReturn(array(
            'status'  => $status,
            'message' => $message,
            'data'    => 1
        ));
    }

    public function editStatus()
    {
        $arr = json_decode(file_get_contents("php://input"));
        $id = $arr->id;

        $status = M('product')->where(['id'=>$id])->find();
        $ss['id'] = $status['id'];
        if($status['status']==0)
        {
            $ss['status'] = 1;
        }else{
            $ss['status'] = 0;
        }
        $status = M('product')->save($ss);
        $status    = !is_numeric($status) ? 0 : 1;
        $message   = !is_numeric($status) ? '失败' : '成功';
        $this->ajaxReturn(array(
            'status'  => $status,
            'message' => $message,
            'data'    => 1
        ));
    }

    public function add()
    {
        $this->display();
    }

    public function addData()
    {
        $data = $_POST;
        $data['create_time'] = time();
        if(!empty($data['fileToUpload'])) {

            $filename = $_FILES["fileToUpload"]["name"];
            $tempname = $_FILES["fileToUpload"]["tmp_name"];
            $folder = "upload/" . $filename;
            move_uploaded_file($tempname, $folder);
            // cannot catch $_FILES
            // think php old version , so make a custom js file
            // i have not use old version , now version is with dollar
            //so cannot create __construct() {} , cannot use abstract , trait
            // enctype="multipart/form-data
        }

        $data = $this->calculate($data);

        $status = M('product')->add($data);
        $this->savePhoto($data , $status);
        $url = U('showProduct');

        header('Location: '.$url);
    }

    public function calculate($data)
    {
        if($data['status'] === "on")
        {
            $data['status'] = 1;
        }
        $weight = $data['weight'];
        $price1 = 1500;
        $price2 = 1000;
        $price3 = 1350;

        if($weight < 1)
        {
            $a = 1;
        }elseif($weight == 1)
        {
            $a = 2;
        }elseif($weight > 1){
            $a = 3;
        }
        switch ($a)
        {
            case 1:
                $data['shipping'] = $weight * $price3;
                break;
            case 2:
                $data['shipping'] = $weight * $price2;
                break;
            case 3:
                $data['shipping'] = $weight * $price3;
                break;
        }
        return $data;

    }


    public function savePhoto($data , $product_id )
    {
        $arr['product_id'] = $product_id;
        $arr['pic_url'] = $data['pic_url'];
        M('product_photo')->add($arr);
    }


}