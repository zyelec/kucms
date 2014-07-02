<?php
class LoginAction extends Action{	
	public function index(){
		$this->display();
	}
	
	public function doLogin(){
		$user=M('user');
		$condition['username']=$_POST['username'];
		$condition['pwssword']=MD5($_POST['password']);
		$res=$user->where($condition)->field('uid')->find();
		if($res){
			//$_SESSION('uid',$res['uid']);
			//$_SESSION('username',$res['username']);
			$_SESSION['id']=$res['uid'];
			$_SESSION['username']=$condition['username'];
			 $this->redirect('Index/index');
			//$this->redirect('Index/index');
		}else{
			$this->error('用户名或密码错误!','index');
		}
	}
	
	public function logout(){
		//echo $_SESSION['id'];
		if(isset($_SESSION['username'])){
			unset($_SESSION['uid']);
			unset($_SESSION['username']);
			session_destroy();			
		}
		  $this->redirect('Login/index');
	}
}