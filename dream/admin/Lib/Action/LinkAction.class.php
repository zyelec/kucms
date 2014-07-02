<?php
class ArticleAction extends CommonAction{
	public function index(){
		$article=D('Article');
		$list=$article->order('id')->relation(true)->select();
		//dump($list);
		$this->assign('alist',$list);
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
			$this->redirect('index');
		}		
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
			//第三步：通模型id,查找相同的分类
			$article=M('Article');
		    $article_list=$article->where('id='.$_GET['id'])->field('cid')->find();
		    
		    $pro_cat=M('Category');
		    $cat_id=$pro_cat->where('id='.$article_list['cid'])->field('moduleid')->find();
		    
		    $cat_result=M('Category');
		    $cat_list=$cat_result->where('moduleid ='.$cat_id['moduleid'])->select();
			//dump($cat_list);
		    /*import("@.ORG.Category");
        	$cat = new Category('Category', array('cid', 'fid', 'name', "cname"));
        	$s = $cat->getList(); */  //获取分类结构
			
			
        	dump($s);
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
				if($article->save()){
					$this->success("更新成功",'index');
				}else{
					$this->error('更新失败','edit');
					//$this->error($article->getError(),'edit');
				}
			}

	}

	public function del(){
		$article=M('Article');
		if(!empty($_GET['id'])){			
			$val=$article->where('id='.$_GET['id'])->find();
			$path='./Public/uploads/';

			if($article->where('id='.$_GET['id'])->delete()){
				$this->success("删除成功");
				if(file_exists($path.$val['img'])){
					unlink ($path.$val['img']);
				}
			}else{
				$this->error("删除失败");
			}
			//dump($val);
			
		}
		//$this->display();
	}
}