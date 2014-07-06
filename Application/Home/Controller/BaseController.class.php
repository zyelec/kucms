<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function _initialize(){      
        $category=M('Category');
        $condition['isshow']=1;
        $condition['fid']=0;
        $clist=$category->where($condition)->select(); 
        /*$clist=$category->field(array('id','cname','fid','path','moduleid','isshow',"concat(path,'-',id)" => "bpath",))->order('bpath asc')->where('isshow=1')->select();*/
        //dump($category->_sql());
        //dump($clist);
        //获取模块
        /*foreach($clist as $key=>$v){          
            $module=M('Module')->where('id='.$v['moduleid'])->find();
            $clist[$key]['module']=$module['name'];
        }  */    
        /*foreach($clist as $key=>$v){
            $clist[$key]['count']=count(explode('-',$v['bpath']));
        }*/

        
            
		if(!empty($clist)){
            foreach ($clist as $key => $value) {
                $clist[$key]['sub']=$category->where('fid='.$value['id'])->select();                
                //$submodule=M('Module')->where('id='.$clist[$key]['moduleid'])->field('name')->find();
                //$clist[$key]['module']=$submodule['name'];
                //dump($submodule);                  
                
            }
		}
		       
        /*
         *测试   
         *
         *$Category = D('Category')->where('category_pid=0')->findAll();
		if(!empty($Category)){ //判断一级是否为空
			foreach($Category as $key=>$value){   //循环读取
			$pid =  $value['category_id'];//字段赋值
			$Category[$key]['child'] = D('Category')->where("category_pid =$pid")->select();
			}
		}
		$this->assign('Category',$Category);//映射值
		

		//标签嵌套方法
		<volist name="Category" id="vo">
		{$sub.name}
		<volist name="vo['child']" id="sub">
		{$sub.name}
		</volist>
		</volist>
        */

       
        
        //配置内容输出
        $config=M('Config');
        $data=$config->field('varname,value')->select();
        foreach($data as $k => $v){
            $this->assign($v['varname'],$v['value']);
        }
        $this->assign('clist',$clist);
        $this->assign('sublist',$sublist);
    }
    /*
    $categroys = $this->dao->where('pid'=>0))->field('id,name')->order('id asc')->select(); 
    if(!empty($categroys )){
    foreach($categroys as $key=>$val){
    $id = $val['id'];
    $categroys [$key]['child'] = $this->dao->where(array('pid' => $id))->select();
    }
    }
    $this->assign('categroys ',$categroys );
    */

    /*
    $q1 = mysql_query("select * from `p_newsclass` where `f_id`=0");  
    while($row1 = mysql_fetch_array($q1)){    
        $sm_class1[] = $row1;   
        $q2 = mysql_query("select * from `p_newsclass` where `f_id`=".$row1['id']);  
        while($row2 = mysql_fetch_array($q2)){  
            $sm_class2[] = $row2;  
        }  
    $smarty->assign("class2",$sm_class2);  
   //子类循环出来，一定要在循环里面，定义到模板里面，不能在循环外，显示不出子类，切记  
    }   
    $smarty->assign("class1",$sm_class1);  
    $smarty->display("nav.html");  

    */


}