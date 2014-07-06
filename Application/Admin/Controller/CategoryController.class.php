<?php
/*
 * 分类模块
 * 
 * */
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller{
	//首页
	public function index(){
		$cate=D('Category');
		//数组中用"",单引号''容易出错
		$list=$cate->field(array("id","cname","fid",'moduleid','path','isshow','sort',"concat(path,'-',id)" => "bpath",))->order('bpath asc')->relation(true)->select();
		//dump($cate->_sql());
		//dump($list);
		foreach($list as $key=>$v){
			$list[$key]['count']=count(explode('-',$v['bpath']));
		}
		
		$this->assign('clist',$list);
		$this->display();
	}
	
	//添加信息
	public function add(){
		$cate=M("Category");
		$list=$cate->field(array("id","cname","fid","moduleid",'path',"concat(path,'-',id)"=>"bpath"))->order('bpath')->select();
		foreach($list as $k=>$v){
			$list[$k]['count']=count(explode('-',$v['bpath']));
			//echo $list[$k]['count'];
		}
		$module=M('Module');
		$mlist=$module->select();
		$this->assign("list",$list);
		$this->assign("mlist",$mlist);
		$this->display();
	}
	
	//处理添加信息
	public function doAdd(){
		if(IS_POST){
			$cate=D('category');
			if($val=$cate->relation(true)->create()){
				//dump($val);
				if($cate->relation(true)->add()){
					$this->success("添加成功!","index");
				}else{
					$this->error("添加失败!","add");
				}
			}
		}
	}
	
	//编辑页面
	public function edit(){
		if($_GET['id']){
			$cate=M("Category");
			$clist=$cate->field(array("id","cname","fid","moduleid","concat(path,'-',id)"=>"bpath",'isshow','template'))->order('bpath')->select();
			foreach($clist as $key => $v){
				$clist[$key]['count']=count(explode('-',$v['bpath']));
			}
			//dump($clist);
			$current=$cate->where("id=".$_GET['id'])->find();
			$module=M('Module');
			$mlist=$module->select();
			dump($current);
			$this->assign("current",$current);
			$this->assign("clist",$clist);
			$this->assign("mlist",$mlist);
			
			$this->display();
		}
		
	}
	
	//处理编辑结果
	public function doEdit(){
		if(IS_POST){
			$cate=D('Category');
			if($val=$cate->create()){
				//dump($val);
				if($cate->save()){
					$this->success("更新成功!",U('Admin/Category/index'));
				}else{
					//echo $cate->getLastSql();
					$this->error("更新失败!",'edit');
				}
			}
		}	
	}
	

	//删 除
	public function del(){
		$cate=M('Category');
		$id=intval($_GET['id']);
		$cval=$cate->where('fid='.$id)->select();
		if($cval){
			$this->error("该分类下有子分类!",'index');
		}else{
			$rs=$cate->where('id='.$id)->delete();
			if($rs){
				$this->success("删除成功!");
			}else{
				$this->error("删除失败!",'Category/index');
			}
		}
	}
	
}