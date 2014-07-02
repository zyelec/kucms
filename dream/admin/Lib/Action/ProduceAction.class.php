<?php
//产品模型
class ProduceAction extends CommonAction{
	public function index(){
		
		$produce=D('Produce');
		import('ORG.Util.Page');
		$list=$produce->order('id')->relation(true)->select();
		//dump($list);
		$this->assign('plist',$list);
		$this->display();
	}
	
	public function add(){
		if(!empty($_GET['id'])){
			$cat=M('Category');
			$cat_list=$cat->where('moduleid='.$_GET['id'])->select();
			//dump($cat_list);
			$this->assign('clist',$cat_list);
			$this->display();			
		}else{
			$this->redirect('');
		}
	}

	public function doAdd(){
		$pro=D('Produce');
		if($val=$pro->create()){
			$pro->img=$this->upload();
			if($pro->add()){
				$this->success("添加成功",'index');
			}else{
				$this->error('添加失败','add');
			}
		}
	}

	public function edit(){
		import("@.Org.Category");
		//$cat = new Category('Category', array('id', 'parentid', 'catname', "cname"));
		//$cat_list= $cat->getList(); //获取分类结构
		if(isset($_GET['id'])){
			$pro=D('Produce');
			$list=$pro->where('id='.$_GET['id'])->find();
			//获取产品id，查询分类id
			$cat=M("Category");
			$clist=$cat->where('id='.$list['pid'])->find();
			$cat = new Category('Category', array('id', 'parentid', 'catname', "cname"));
			$cat_list= $cat->getChild($clist['moduleid']); //获取分类结构
			dump($cat_list);
			//$module=M("Category");
			//$mlist=$module->where('moduleid='.$clist['moduleid'])->select();
			$this->assign('mlist',$mlist);
			$this->assign('plist',$list);
			$this->display();
		}
		
	}
	
	public function doEdit(){
		$pro=M('Produce');
		if($pro->create()){
			if($_FILES['img']['error']==0){
				$pro->img=$this->upload();
				//$oldimg='./Public/uploads/'.$_POST['img'];
				/*if(file_exists($oldimg)){
					unlink($oldimg);
				}*/
				if(file_exists('./Public/uploads/'.$_POST['img'])){
					unlink('./Public/uploads/'.$_POST['img']);
				}
			}
			if($pro->save()){
				$this->success("更新成功");
			}else{
				$this->error($pro->getError(),'index');
			}
		}
		
		//$this->display();
	}

	public function del(){
		if(isset($_GET['id'])){
			$pro=M('Produce');
			$list=$pro->where('id='.$_GET['id'])->find();
			if($result=$pro->where('id='.$list['id'])->delete()){
				$this->success('删除成功!');
				if(file_exists('./Public/uploads/'.$list['img'])){
					unlink('./Public/uploads/'.$list['img']);
				}
			}else{
				$this->error("删除失败!");
			}
		}
		//$this->display();
	}
}