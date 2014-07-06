<?php
namespace Admin\Controller;
use Think\Controller;
class ProduceController extends Controller{
	public function index(){
		$produce=D('produce');
		$result=$produce->order('id asc')->relation(true)->select();
		//dump($result);
		$this->assign('plist',$result);
		$this->display();
	}
	
	public function add(){
		if(IS_POST){
			$produce=M('Produce');
			if($produce->create()){			
				$produce->img=$this->_upload();				
				if($produce->add()){				
					$this->success("添加成功!",U('Produce/index'));
				}else{
					$this->error("添加失败!",U('Produce/add'));
				}
			}else{
				$this->error($produce->getError());
			}
		}else{
			echo $mid=trim($_GET['id']);
			$cate=M('Category');
			$clist=$cate->field(array("id","fid","cname","concat(path,'-',id)"=>"bpath"))->where('moduleid='.$mid)->order('bpath')->select();
			foreach($clist as $key => $v){
				$v['count']=count(explode('-',$v['bpath']));
				$clist[$key]['count']=$v['count'];
			}			
			$this->assign('clist',$clist);
			$this->display();
		}	
	}
	

	//产品编辑模块
	public function edit(){
		if(IS_POST){
			$produce=M('Produce');
			if($data=$produce->create()){	
				dump($data);die;			
				if($_FILES['img']['error']==0){
					$img=$this->_upload();				
					if(!isset($img)){
						$this->error($produce->getError());
					}else{
						$produce->img=$img;
					}
					$isImg="./Public/Uploads/".$_POST['oldimg'];
					//echo $isImg;
					if(file_exists($isImg)){
						unlink($isImg);
					}
				}
				if($produce->save()){
					$this->success('更新成功',U('Produce/index'));
				}else{
					$this->error('更新失败',U('Produce/edit'));
				}
			}
		}else{
			if($_GET['id']){			
				$produce=M('Produce');			
				$list=$produce->where('id='.$_GET['id'])->find();
				//dump($list);
				$category=M('Category');
				//在产品表(produce),通过id查询pid
				//$pid=$produce->where('id='.$GET['id'])->field('pid');
				$clist=$category->where('id='.$list['cid'])->field('moduleid')->find();
				$mlist=$category->where('moduleid='.$clist['moduleid'])->select();
				//在category表，通过pid查询catname
				//查询全部的分类
				dump($mlist);
				$this->assign('mlist',$mlist);
				$this->assign('plist',$list);
				$this->display();
			}
		}	
	}
	
	
	public function delete(){
		if($_GET['id']){
			$list=M('Produce')->where('id='.$_GET['id'])->delete();
			if($list){
				$this->success('删除成功!',U('index'));
			}else{
				$this->error('删除失败!',U('index'));
			}
			
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