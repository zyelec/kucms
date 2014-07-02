<?php
namespace Admin\Controller;
use Think\Controller;
class PageController extends Controller{
	public function index(){
		$page=D("Page");
		//$list=$page->relation(true)->order("id asc")->select();
		//dump($list);
		//dump($page->_sql());
		$count=$page->count('id');
		$pagination=new \Think\Page($count,5);
		//listRows  每页显示的条数            
		//firstRow  起始页数
		$list=$page->limit($pagination->firstRow.','.$pagination->listRows)->order('id desc')->relation(true)->select();
		//dump($list);
		$this->title="添加内容";
		$this->page=$pagination->show();
		$this->assign("alist",$list);
		$this->display();
	}
	
	//添加页面
	public function add(){
		$mid=$_GET['id'];
		$cate=M('Category');
		$clist=$cate->field(array("id","fid","cname","concat(path,'-',id)"=>"bpath"))->order('bpath')->where('moduleid='.$mid)->select();
		foreach($clist as $key => $v){
			$v['count']=count(explode('-',$v['bpath']));
			$clist[$key]['count']=$v['count'];
		}
		//dump($clist);
		$this->assign('clist',$clist);
		$this->display();		
	}
	
	//处理添加页面
	public function doAdd(){
		if(IS_POST){
			$page=M("Page");
			if($page->create()){
				$page->img=$this->_upload();

				//echo $page->img;
				if($page->add()){
					$this->success("添加成功!",U('Page/index'));
				}else{
					$this->error("添加失败!",U('Page/add'));
				}
			}
		}
	}
	
	//编辑
	public function edit(){
		if($_GET['id']){
			$page=M('Page');
			$list=$page->where('id='.$_GET['id'])->find();
			//查询分类
			//dump($list['cid']);
			$cate=M('Category');
			$module=$cate->where('id='.$list['cid'])->field('moduleid')->find();
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
	
	//处理编辑
	public function doEdit(){
		if(IS_POST){
			$page=M('Page');
			if($page->create()){
				if($_FILES['img']['error']==0){
					$img=$this->_upload();
				
					if(!isset($img)){
						$this->error($page->getError());
					}else{
						$page->img=$img;
					}
					$isImg="./Public/Uploads/".$_POST['oldimg'];
					//echo $isImg;
					if(file_exists($isImg)){
						unlink($isImg);
					}
				}
				if($page->save()){
					$this->success("更新成功!",U('Page/index'),10);
				}else{
					$this->error("更新失败!",U('Page/edit'));
				}
			}
		}
	}
	
	//删除
	public function del(){
		$id=I('id',0,'intval');
		$val=M('Page')->where('id='.$id)->find();		
		if(M('Page')->where('id='.$id)->delete()){
			if(file_exists("./Public/Uploads/".$val['img'])){
				unlink("./Public/Uploads/".$val['img']);
			}
			$this->success("删除成功!",U('Page/index'));
		}else{
			$this->error("删除失败!");
		}
		

	}
	
	//批量删除
	public function delBatch(){
			
	}
	
	//回收站
	public function trash(){
		$page=D('Page');
		$count=$page->count('id');
		$page=new \Think\Page($count,5);
		$list=$page->limit($page->firstRow.','.$page->listRows)->where('is_del=1')->relation(true)->select();
		$this->assign('list',$list);
		$this->display();
	}
	
	//删除到回收站
	public function toTrash(){
		$id=I('id',0,'intval');
		$data['is_del']=1;
		$val=M('Page')->where('id='.$id)->data($data)->save();
		if($val){
			$this->success("删除成功!",U('Page/index'),3);
		}else{
			$this->error("删除失败");
		}
	}
	
	//恢复
	public function recover(){
		$id=I('id',0,'intval');
		$data['is_del']=0;
		$val=M('Page')->where('id='.$id)->data($data)->save();
		if($val){
			$this->success("恢复成功!",U('Page/trash'),3);
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