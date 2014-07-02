<?php
//轮换广告
class RotateAction extends CommonAction{
	public function index(){
		$rotate=M('Rotate');
		$list=$rotate->order('sort desc,id desc')->select();
		//dump($list);
		$this->assign('rlist',$list);
		$this->display();
	}

	public function add(){
		$this->display();
	}

	public function doAdd(){

		$rotate=M('Rotate');
		if($rotate->create()){
			$rotate->img=$this->upload();
			if($rotate->add()){
				$this->success('添加成功','index');
			}else{
				$this->error('添加失败','add');
			}
		}			

	}

	public function edit(){
		if(!empty($_GET['id'])){
			$rotate=M('Rotate');
			$list=$rotate->where('id='.$_GET['id'])->find();
		    //dump($list);
			$this->assign('vo',$list);
			$this->display();		
		}else{
			$this->redirect('index');
		}

	}
	
	public function doEdit(){

			$rotate=M('Rotate');
			if($rotate->create()){
				
				if($_FILES['img']['error']==0){
					$rotate->img=$this->upload();
					$oldimg='./Public/uploads/'.$_POST['img'];	
					if(file_exists($oldimg)){
						unlink($oldimg);
					}			
				}

				if($rotate->save()){
					$this->success('更新成功','index');
				}else{
					$this->error('更新失败','index');
				}
			}
	}
	
	//排序
	/*
	 * 	//排序
	public function order(){
		if ($_POST['order']){
			$article = M('Article');
			foreach ($_POST['orders'] as $id => $ordid) {
				$data['ord'] = $ordid;
				$article->where('id='.$id)->save($data);
			}
			$this->success('修改成功！');
		}
	
	 */
	public function sort(){
			if ($_REQUEST['order']){
			$rotate=M('Rotate');
			foreach ($_REQUEST['order'] as $id => $ordid) {
				$data['ord'] = $ordid;
				$rotate->where('id='.$id)->save($data);
			}
			$this->success('修改成功！');
		}
	}
	
	//删除

		/*	if($get_act == 'del_news')
			{
				$news_id = trim($_REQUEST['id']);
				$condition['id']  = array('in',$news_id);

				if($news->where($condition)->delete())
				{
					$this->assign("jumpUrl","admin.php/news/index");
					$this->success($_LANG['result']['del_success']);
				}else{
					$this->error($_LANG['result']['add_fail']);*/
				
	public function del(){
		$id=Trim($_REQUEST['id']);
		$condition['id']=array('in',$id);
		$rotate=M('Rotate');
		$val=$rotate->where($condition)->select();
		dump($val);
		exit();
		if($rotate->where($condition)->delete()){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");	
		}
		
	}
}