<?php
class CommonAction extends Action{
	
	function _initialize(){
		//防止出现乱码
		//header('Content-Type:text/html; charset=utf-8');
		if(!isset($_SESSION['username'])){
		//if(!$_SESSION['username']){
			//echo $_SESSION['username'];
			$this->redirect('Login/index');
		}
	}
	
	//图片上传
	protected function upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->maxSize  = 3145728 ;
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
		$upload->savePath =  './Public/Uploads/';
		if(!$upload->upload()) {
			$this->error($upload->getErrorMsg());
		}else{
			$info =  $upload->getUploadFileInfo();
			$pic=$info[0]['savename'];
			return $pic;
		}		
	}
	
	//无限分类
	//把分类安类别组合成数组
	function dispCategory($catlist,$fid=1){
	

		foreach($categoryArray as $category){
			if($category['fid']==$fid){

			echo $category['cname'];
			dispCategory($category['id']);

			}
		}

	}

}