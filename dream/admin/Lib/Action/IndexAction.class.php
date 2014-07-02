<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {

    public function index(){
    	$this->display();
	}
	
	Public function header(){
		$cat=M('Category');
		$catList=$cat->order('id')->select();
		//dump($catList);
    	$this->assign('catList',$catList);
    	$this->display("Public:header");
	}
	
	//密码框
	public function pws(){
		$this->display();
	}
	
	//修改密码
	public function mod_pws(){
		if(!empty($_POST['oldpws'])){
			$user=M('User');
			$condition['password']=MD5($_POST['oldpws']);
			$r=$user->where($condition)->find();
			//echo $r;
			if($r){
				if($_POST['password'] !=$_POST['repassword']){
					echo "两次输入的密码不致";
					$this->redirect('Index/pws');
				}else{
					$data['password']=$_POST['password'];
					if($user->where($data)->save()){
						$this->success('更新成功','Index/pws');
					}else{
						$this->error('更新失败','Index/pws');
					}
				}
			}else{
				echo "密码输入错误";
				$this->redirect('Index/pws');
			}
		}
	}
	
	//更新缓存
	public function cache(){
	
	}
}