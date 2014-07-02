<?php
class ArticleAction extends CommonAction{
	public function index(){
		$article=D('Article');
		$list=$article->order('id')->relation(true)->select();
		//dump($list);
		$this->assign('alist',$list);
		$this->display();
		
		//上一篇下一篇
		//$after=$this->dao->where("catid=$data[catid] and id<$id")->order('id desc')->find();
		//$front=$this->dao->where("catid=$data[catid] and id>$id")->order('id asc')->find();
	}
	
	public function add(){      	
		if(!empty($_GET['id'])){
			import("@.ORG.Category");
			$tree = new Category();
			$cat=M('Category');
			$fid=$cat->where('moduleid='.$_GET['id'])->field('id');	
			//dump($fid);		
			$treelist=$tree->getChild($fid); 
			dump($treelist);
			$this->assign('clist',$cat_list);
			$this->display();
		}else{
			$this->redirect('index');
		}	
		//$this->display();	
	}

	public function doAdd(){
		$article=M('Article');
		if($val=$article->create()){
			$article->img=$this->upload();
			if($article->add()){
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
			//第三步：通过模型id,查找相同的分类
			$article=M('Article');
		    $article_list=$article->where('id='.$_GET['id'])->field('cid')->find();
		    
		    $pro_cat=M('Category');
		    $cat_id=$pro_cat->where('id='.$article_list['cid'])->field('moduleid')->find();
		    
		    $cat_result=M('Category');
		    $cat_list=$cat_result->where('moduleid ='.$cat_id['moduleid'])->select();
			$article=D('Article');
			$list=$article->where('id='.$_GET['id'])->relation(true)->find();
			$this->assign('vo',$list);
			$this->assign('clist',$cat_list);
			$this->display();
		}else{
			$this->redirect('index');
		}
	}
	

	//新闻编辑
	public function doEdit(){
		$article=M('Article');				
			if($val=$article->create()){
				//echo $_POST['img'];
				if($_FILES["img"]["error"]==0){
					$article->img=$this->upload();
					$oldimg='./Public/uploads/'.$_POST['img'];
					if(file_exists($_POST['img'])){
						unlink($oldimg);
					}
				}
				if($r=$article->save()){
					//dump($r);
					$this->success("更新成功",'index');
				}else{
					$this->error('更新失败','edit');
					//$this->error($article->getError(),'edit');
				}
			}

	}
	
	//删除到回收站
	public function doTrash(){
		if(isset($_GET['id'])){
			echo $_GET['id'];
			$article=M("Article");
			$data['is_del']=1;
			$val=$article->where('id='.$_GET['id'])->data($data)->save();
			dump($article->_sql);
			if($val){
				$this->success("删除到回收站成功!",U('Article/index'));
			}else{
				$this->error("删除到回收站失败!",U('Article/index'));
			}	
		}
	}
	
	//恢复删除
	public function recover(){
		if(isset($_GET['id'])){
			$data['is_del']=0;
			$val=M('Article')->where('id='.$_GET['id'])->data($data)->save();
			if($val){
				$this->success("恢复成功!",U('Article/trash'));
			}else{
				$this->error("恢复失败!",U('Article/trash'));
			}
		}
	}
	
	
	//回收站
	public function trash(){
		$article=D('Article');
		$list=$article->where('is_del=1')->select();
		$this->assign("alist",$list);
		$this->display();
		
	}
	
	//删除
	public function del(){
			$article=M('Article');
			if(!empty($_REQUEST['id'])){
				$id=$_REQUEST['id'];
				$condition['id']=array('in',$id);		
				$val=$article->where($condition)->select();
				//dump($val);
				$path='./Public/uploads/';
				if($article->where($condition)->delete()){
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