<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller{
	public function index(){
		$article=D("Article");
		//$list=$article->relation(true)->order("id asc")->select();
		//dump($list);
		//dump($article->_sql());
		$count=$article->count('id');
		$page=new \Think\Page($count,5);
		//listRows  每页显示的条数            
		//firstRow  起始页数
		$list=$article->limit($page->firstRow.','.$page->listRows)->order('id desc')->where('is_del=0')->relation(true)->select();

		$this->page=$page->show();
		$this->assign("alist",$list);
		$this->display();
	}
	
	//添加页面
	public function add(){
		echo $mid=$_GET['id'];
		$cate=M('Category');
		$clist=$cate->field(array("id","fid","cname","concat(path,'-',id)"=>"bpath"))->where('moduleid='.$mid)->order('bpath')->select();
		foreach($clist as $key => $v){
			$v['count']=count(explode('-',$v['bpath']));
			$clist[$key]['count']=$v['count'];
		}
		dump($clist);
		$this->assign('clist',$clist);
		$this->display();		
	}
	
	//处理添加页面
	public function doAdd(){
		if(IS_POST){
			$article=M("Article");
			if($article->create()){
				$article->img=$this->_upload();

				//echo $article->img;
				if($article->add()){
					$this->success("添加成功!",U('Article/index'));
				}else{
					$this->error("添加失败!",U('Article/add'));
				}
			}
		}
	}
	
	//编辑
	public function edit(){
		if(IS_POST){
			$article=M('Article');
			if($article->create()){
				if($_FILES['img']['error']==0){
					$img=$this->_upload();		
					if(!isset($img)){
						$this->error($article->getError());
					}else{
						$article->img=$img;
					}
					$isImg="./Public/Uploads/".$_POST['oldimg'];
					//echo $isImg;
					if(file_exists($isImg)){
						unlink($isImg);
					}
				}
				if($article->save()){
					$this->success("更新成功!",U('Article/index'));
				}else{
					$this->error("更新失败!",U('Article/edit'));
				}
			}
		}else{
			if($_GET['id']){
				$article=M('Article');
				$list=$article->where('id='.$_GET['id'])->find();
				//查询分类
				$cate=M('Category');
				$module=$cate->field('moduleid')->where('id='.$list['cid'])->find();
				$clist=$cate->field(array("id","fid","cname","concat(path,'-',id)"=>"bpath"))->order('bpath')->where('moduleid='.$module['moduleid'])->select();
				foreach($clist as $key => $v){
					$v['count']=count(explode('-',$v['bpath']));
					$clist[$key]['count']=$v['count'];
				}
				//dump($clist);
				$this->assign('alist',$list);
				$this->assign('clist',$clist);
				$this->display();
			}
		}		
	}
	
	//删除
	public function del(){
		$id=I('id',0,'intval');
		$val=M('Article')->where('id='.$id)->find();		
		if(M('Article')->where('id='.$id)->delete()){
			if(file_exists("./Public/Uploads/".$val['img'])){
				unlink("./Public/Uploads/".$val['img']);
			}
			$this->success("删除成功!",U('Article/index'));
		}else{
			$this->error("删除失败!");
		}
		

	}
	
	//批量删除
	public function delBatch(){
			
	}
	
	//回收站
	public function trash(){
		$article=D('Article');
		$count=$article->count('id');
		$page=new \Think\Page($count,5);
		$list=$article->limit($page->firstRow.','.$page->listRows)->where('is_del=1')->relation(true)->select();
		$this->assign('list',$list);
		$this->display();
	}
	
	//删除到回收站
	public function toTrash(){
		$id=I('id',0,'intval');
		$data['is_del']=1;
		$val=M('Article')->where('id='.$id)->data($data)->save();
		if($val){
			$this->success("删除成功!",U('Article/index'),3);
		}else{
			$this->error("删除失败");
		}
	}
	
	//恢复
	public function recover(){
		$id=I('id',0,'intval');
		$data['is_del']=0;
		$val=M('Article')->where('id='.$id)->data($data)->save();
		if($val){
			$this->success("恢复成功!",U('Article/trash'),3);
		}else{
			$this->error("恢复失败");
		}
	}	
	
	
	
	//图片上传
	function _upload(){
		$upload=new \Think\Upload();
		$upload->autoSub = false;
		$upload->savePath  ='./Uploads/'; 
		$info=$upload->upload();
		if(!$info){
			$this->error($upload->getError());
		}else{
			foreach($info as $file){
				return $file['subName'].$file['savename'];
			}
		}
	}
	
}