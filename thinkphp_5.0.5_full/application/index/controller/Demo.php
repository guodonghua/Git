<?php
namespace app\index\controller;

use think\Controller;
use think\Model\Exat;
use think\Request;
use think\Db;
header('content-type:text/html;charset=utf8');
/**
 * 
 */
class Demo extends Controller
{

	/*
	*添加
	 */
	public function Add(){
		 // echo 11;die;
		return view();
	}
	public function Adds(){
		$data = input('post.');
        $file = Request()->file('file');
        // var_dump($name);die;
        $info = $file->move(ROOT_PATH.'/public/static/uploads/',true,false);
        
        $data['img']= $info->getsaveName();
         // var_dump($data['img']);die;
		$model = model('Exat');
	  	$data = $model->addUser($data);
	  	if($data){
	  		$this->success('添加成功','show');
	  		 // DB('exat')->insert($data);
	  	}else{
	  		$this->error('添加失败','add');
	  	}
	 }

	 /*
	 *展示方法
	  */
	 public function Show(){
        $page = input('get.');
	 	$data = DB('Exat')->paginate(1);
       // 查询状态为1的用户数据 并且每页显示10条数据
        // 获取分页显示
        $page = $data->render();
        // 模板变量赋值
        $this->assign('data', $data);
        $this->assign('page', $page);
        if(request()->isAjax()){
            // echo 11;
            return $this->fetch('ajax');
        }else{
             return $this->fetch();
        }
   }

   /*
   *删除
    */
   public function Dele(){
   		$id = input("id");	
        $model = model('Exat');
        $data = $model->dele($id);
        // var_dump($data);die;
		// $data = Db::table('Exat')->where('id',$id)->delete();s
		if($data){
			$this->success('删除成功','show');
		}else{
			$this->error('删除失败','show');
		}
    }

    /*
    *更新数据
     */
    public function Upda(){
        $model = model('Exat');
    	$id = input('id');
        $data = $model->upda($id);
    	// $data = DB('Exat')->where(['id'=>$id])->select();
    	return $this->fetch('upda',['data'=>$data]);
    }

    /*
    *更新
     */
    public function Update(){
    	$model = model('Exat');
    	$post = input('post.');
        $arr = [
            'names'=>$post['names'],
            'prices'=>$post['prices'],
            'descc'=>$post['descc'],
            // 'img'
        ];
        $data = $model->updates($post['id'],$arr);
    	// var_dump($data);die;
    	// $data = $model-> where(['id'=>$post['id']])->Update($arr);
    	if($data){
    		$this->success('更新成功','show');
    	}else{
    		$this->error('更新失败','show');
    	}
    }

    public function addsa(){
        $id = input('get.');
        var_dump($id);
    }
}

?>