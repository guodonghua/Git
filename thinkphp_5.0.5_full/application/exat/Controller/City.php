<?php
namespace app\exat\controller;

use think\Controller;
use think\Db;
use think\Request;
header('content-type:text/html;charset=utf8');
class City extends Controller{

	public function aa(){
		// echo 11;die;
		return View();
	}

	public function adds(){
		try {
			Db::startTrans();
			$data = input('post.');
			 $id= $data['c_id'];
		   // print_r($data);die;
			$arr = DB::table('student')->insert($data);
			 // var_dump($arr); die;
			$res = DB::table('class')->where('c_id',$id)->update(['num'=>'num'+1]);
			// var_dump($res);
			if($arr ==1 && $res ==1){
				echo 'success';	
				DB::commit();
			}else{
				echo 'error';	
			DB::rollback();
			}
			
		} catch (Exception $e) {
			echo 'error';	
			DB::rollback();
			
		}
	}
}

?>