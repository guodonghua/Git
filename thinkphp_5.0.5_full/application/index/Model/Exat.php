<?php
namespace app\index\model;

use think\Model;
use think\Request;

/**
 * 
 */
class Exat extends Model
{

	protected $table = 'exat';

	public function addUser($datas){
			$model = new Exat;
			$model->data=$datas;
			if($model->save()){
				return true;
			}else{
				return false;
			}
	}

	public function dele($id){
		// var_dump($id);die;
		return $this->where('id',$id)->delete();
	}

	public function upda($id){
		return $this->where('id',$id)->select();
	}

	public function updates($id,$arr){
		return $this->where('id',$id)->update($arr);
	}

}