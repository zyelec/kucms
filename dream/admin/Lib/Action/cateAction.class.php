<?php
class Tool {
    static public $treeList = array(); //存放无限分类结果如果一页面有多个无限分类可以使用 Tool::$treeList = array(); 清空
    /**
     * 无限级分类
     * @access public 
     * @param Array $data     //数据库里获取的结果集 
     * @param Int $pid             
     * @param Int $count       //第几级分类
     * @return Array $treeList   
     */
    static public function tree(&$data,$pid = 0,$count = 1) {
        foreach ($data as $key => $value){
            if($value['Pid']==$pid){
                $value['Count'] = $count;
                self::$treeList []=$value;
                unset($data[$key]);
                self::tree($data,$value['Id'],$count+1);
            } 
        }
        return self::$treeList ;
    }
    
 }
 
 /*
  $treeList[] 保存排序的结果 基本就是进行了一次排序 保存后就可以 unset($data[$key]); 掉 因为已经使用不到了
	&$data 使用按地址传参,结合unset($data[$key]); 减少循环次数,这样效率提高了好几倍,
	但需要对 Pid进行 ASC的排序 不然会显示不完全
	$value['Count'] = $count; 为当前的等级 在模板里会通过等级进行生成树形结构
	
	排序前后的数据结构如下
	表所需要字段 Id,Pid
	排序前的数据结构
	id 　 pid 
	1 　　 0
	2 　　 0
	3 　　 1
	4 　 　 3
	
	排序后的数据结构
	id 　pid 　count 
	1 　　0 　　 1
	3　 　1　　 2
	4 　　3 　　 3
	2 　　0 　　1 
	 //默认列表
    public function index() {    
        $menu = M('Menu');
        $list = $menu->order('Pid ASC,Morder DESC,Id ASC')->select();
        $this->assign('List',Tool::tree($list));    
                 $this->display();
    }
复制代码
控制器里调用
       <td style="text-indent:<{$vo['Count']*20}>px;"><neq name="vo.Count" value="1">| -- </neq><{$vo.Name}></td>
复制代码
模板使用里<volist> 正常输出即可 把需要生成树结构的字段 修改成如上
*/