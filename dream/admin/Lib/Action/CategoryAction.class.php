<?php
class CategoryAction extends Action{
	public function index(){
		//$cat=M('Category');
		//$cat_list=$cat->order('id')->select();
		//dump($cat_list);
		
		
	    import("@.ORG.Category");
        $cat = new Category('Category', array('id', 'parentid', 'catname', "cname"));
        $cat_list= $cat->getList(); //获取分类结构
        
        /*foreach ($s as $vo) {
            echo $vo['cname'] . '<br>';
        }*/
        $this->assign('catList',$cat_list);
		$this->display();
	}
	
	public function sort($cat,$pid=0){
		$arr=array();
		foreach ($cat as $v){
			if($v['pid']==$pid){
				$v['child']=sort($cat,$v['id']);
				$arr[]=$v;
			}
		}
		return $arr;
	}
	
	
	public function add(){
	    import("@.ORG.Category");
        $cat = new Category('Category', array('id', 'parentid', 'catname', "cname"));
        $cat_list= $cat->getList(); //获取分类结构
		
		$module=M('Module');
		$module_list=$module->order('id')->select();
		//dump($cat_list);
		$this->assign('cList',$cat_list);
		$this->assign('mList',$module_list);
		$this->display();	
		
	}
		
	public function doAdd(){
			$cat=D('Category');
			if($val=$cat->create()){
				$module=M('Module');
				$mList=$module->where('id='.$cat->moduleid)->find();
				$cat->module=$mList['name'];
				//dump($mList);
				//exit();
				if($cat->add()){
					$this->success("添加成功",'index');
				}else{
					$this->error("添加失败",'add');
				}
			}
			
		}
		
	public function edit(){
			import("@.ORG.Category");
			$cat = new Category('Category', array('id', 'parentid', 'catname', "cname"));
       		$cat_list= $cat->getList(); //获取分类结构
			if(!empty($_GET['id'])){
				$cat=M('Category');
				$clist=$cat->where('id='.$_GET['id'])->find();
				//dump($clist);
				$module=M('Module');
				$mlist=$module->select();				
				$this->assign('mlist',$mlist);
				$this->assign('clist',$clist);
				$this->assign('cat_list',$cat_list);
				$this->display();	
			}else{
				$this->error('编辑项不存在');
			}
		}
		
	public function doEdit(){
		
			$cat=D('Category');
			if($r=$cat->create()){
				dump($r);
				//exit();
				if($cat->save()){
					$this->success('修改成功');
				}else{
					$this->error('修改失败');
				}
			}

	}
		
	public function del(){
		$cat=D('Category');
		if(!empty($_REQUEST['id'])){
			$condition['id']=array('in',$_REQUEST['id']);
			dump($condition);
			$r=$cat->where('parentid='.$condition)->find();
			dump($r);
			exit();
			if($r){
				$this->error('请先删除该分类的下级分类');
			}else{
				$f=$cat->where($condition)->delete();
				if($f){
					$this->success('删除成功');
				}else{
					$this->error('删除失败');
				}
			}
		}
	}
}