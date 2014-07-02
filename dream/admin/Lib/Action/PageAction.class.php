<?php
class PageAction extends CommonAction{
	public function index(){
		$page=D('Page');
		$list=$page->order('id')->select();
		//dump($list);
		$this->assign('alist',$list);
		$this->display();
	}
	
	public function add(){
		if(!empty($_GET['id'])){
			$cat=M('Page');
			$cat_list=$cat->where('moduleid='.$_GET['id'])->select();
			//dump($cat_list);
			$this->assign('clist',$cat_list);
			$this->display();
		}else{
			$this->redirect('index');
		}		
	}

	public function doAdd(){
		$Page=M('Page');
		if($val=$Page->create()){
			$Page->img=$this->upload();
			if($Page->add()){
				$this->success('添加成功','index');
			}else{
				$this->redirect('add');
			}
		}
	}
	
	public function edit(){
		if(!empty($_GET['id'])){
			//编辑获取分类
			//第一步：先获取该新闻的id，通过新闻查到分类id
			//第二步：在分类列表中，查找分类id的查找模型id
			//第三步：通模型id,查找相同的分类
			$Page=M('Page');
		    $Page_list=$Page->where('id='.$_GET['id'])->field('cid')->find();
		    
		    $pro_cat=M('Category');
		    $cat_id=$pro_cat->where('id='.$Page_list['cid'])->field('moduleid')->find();

        	dump($s);
			$Page=D('Page');
			$list=$Page->where('id='.$_GET['id'])->relation(true)->find();
			$this->assign('vo',$list);
			$this->assign('clist',$cat_list);
			$this->meta_title="编辑";
			$this->display();
		}else{
			$this->redirect('index');
		}
	}

	//新闻编辑
	public function doEdit(){
		$Page=M('Page');	
			
			if($val=$Page->create()){
				//echo $_POST['img'];
				if($_FILES["img"]["error"]==0){
					$Page->img=$this->upload();
					$oldimg='./Public/uploads/'.$_POST['img'];
					if(file_exists($_POST['img'])){
						unlink($oldimg);
					}

				}
				if($Page->save()){
					$this->success("更新成功",'index');
				}else{
					$this->error('更新失败','edit');
					//$this->error($Page->getError(),'edit');
				}
			}

	}

	public function del(){
		$Page=M('Page');
		if(!empty($_REQUEST['id'])){
			$condition['id']=array('in',$_REQUEST['id']);			
			$val=$Page->where($condition)->find();
			$path='./Public/uploads/';

			if($Page->where($condition)->delete()){
				$this->success("删除成功");
				if(file_exists($path.$val['img'])){
					unlink ($path.$val['img']);
				}
			}else{
				$this->error("删除失败");
			}		
		}
	}
}