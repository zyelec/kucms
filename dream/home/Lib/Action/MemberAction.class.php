<?php
class MemberAction extends CommonAction{
	public function login(){
		if($_SESSION['verify']!=MD5($_POST['verify'])){
			$this->error('验证码错误');
		}else{
			$member=M('Member');
			$username=trim($_POST['username']);
			$condition['username']=$username;
			$condtion['password']=MD5($_POST['password']);
			$r=$member->where($condition)->find();
			if($r){
				//echo $username;
				cookie('user',$username);
				$this->success('登录成功');

			}else{
				$this->error('登录失败');
			}
		}
	}
	
	public function reg(){
		$this->display();
	
	}

	public function doReg(){
		if($_SESSION['verify']!=md5($_POST['verify'])){
			$this->error('验证码错误');
		}else{
			$member=M('Member');
			$conditon['username']=trim($_POST['username']);
			if($member->where($conditon)->field('username')->find()){
				$this->error('用户名已经被注册');
			}else{
				if($_POST['password']!=$_POST['repassword']){	
					$this->error( "两次输入的密码不相同");
				}else{		
					if($member->create()){
						$member->reg_time=time();
						$member->password=MD5($_POST['password']);
						if($member->add()){
							$this->success('注册成功');
							setcookie('user',trim($_POST['username']));
						}else{
							$this->error('注册失败');
						}
					}									
				}					
			}
		}
	}

	public function logout(){
		
		if(isset($_COOKIE['user'])){
			cookie('user',null);
			$this->success("退出成功");	
			echo $_COOKIE['user'];	
		}

	}
}