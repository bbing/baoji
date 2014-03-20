<?php
//表的控制器
Class MtableAction extends CommonAction
{
   public function index()
   {
	  $Mtable=D('Mtable');
	  import('ORG.Util.Page');
	  $count= $Mtable->count();
	  $Page= new Page($count,25);
	  $show= $Page->show();
	  $list= $Mtable->limit($Page->firstRow.','.$Page->listRows)->select();
	  $this->assign('lists',$list);
	  $this->assign('page',$show);
	  $this->display(); 
	}
	//模型添加
   public function do_add()
   {
	  $Mtable=D('Mtable');
	  if($Mtable->create())
	  {
		   if($Mtable->add())
		   {
			   //创建表
			   $query="CREATE TABLE  `".C('DB_PREFIX').I('code')."` (
			   `aid` INT NOT NULL,
			   `content` TEXT   NOT NULL,
			   `optime` INT NOT NULL,
			    PRIMARY KEY (  `aid` )
				) ENGINE = MYISAM  CHARACTER SET utf8 COLLATE utf8_general_ci";
			   $Mtable->query($query);
			   $this->success(L('lan_success'));
		   }
		   else
		   {
			  $this->error(L('lan_error'));    
		   }
	  }
	  else
	  {
		$this->error($Mtable->geterror());   
	  }
    }
   //模型删除
   public function del()
   {
	 $id=I('id');
	 $Mtable=D('Mtable');
	 
	 $data=$Mtable->find($id);
     
	 
	 $query="DROP TABLE  `".C('DB_PREFIX').$data['code']."`";
	 $Mtable->query($query);
	 	 
	 
	 if($Mtable->delete($id))
	 {
	   $this->success(L('lan_del')); 	 
     }
	 else
	 {
		 $this->error(L('lan_error'));
	  }
   }		
   //字段管理
   public function fieldlist()
   {
	 $id=I('id');
	 $Mtable=D('Mtable');
	 $data=$Mtable->find($id);
	 $this->assign('isflag',$data['fieldlist']);
	 $this->assign('data',$data);
	 $this->assign('id',$id);
	
     //字段列表
     $fields=M('field')->where(array('mid'=>$id))->select();

	/* $fields=$this->getfields($id);*/
	 $this->fields=$fields;
	 $this->display(); 
   }
   
   //字段添加
   public function do_addfield()
   {
	 if(!IS_POST) _404(L('lan_common'),U(GROUP_NAME.'/Mtable/index'));  
	 //检测是否已经添加到了该字段
	 $id=I('id');
	 $mdata=D('field')->where(array('mid'=>$id))->select();
	 foreach($mdata as $key=>$m)
	 {
	 	if(I('code')==$m['code'])
	 		$this->error('字段已经存在');
	 }

	 //更新Mtable内容
	 $datam=array(
	 	'mid'=>$id,
	 	'name'=>I('name'),
	 	'code'=>I('code'),
	 	'type'=>I('type'),
        'length'=>I('length')
	 	);
	 
	 $count=D('Field')->add($datam);

	 
	$Mtable=D('Mtable');
	$data=$Mtable->find($id);
	 switch(I("type"))
	 {
	  case 'int': 
	  	$query="ALTER TABLE `".C('DB_PREFIX').$data['code']."` ADD  `".I('code')."` INT(".I('length').")  NOT NULL   DEFAULT  '0'";break;
	  case 'varchar': 
	  	$query="ALTER TABLE `".C('DB_PREFIX').$data['code']."` ADD  `".I('code')."` VARCHAR( ".I('length')." ) NOT NULL";break;	 
	  case 'text': 
	  	$query="ALTER TABLE  `".C('DB_PREFIX').$data['code']."` ADD  `".I('code')."` TEXT NOT NULL";break;
	 case 'time': 
	  	$query="ALTER TABLE `".C('DB_PREFIX').$data['code']."` ADD  `".I('code')."` INT(".I('length').")  NOT NULL   DEFAULT  '0'";break;
	  case 'edit': 
	  	$query="ALTER TABLE  `".C('DB_PREFIX').$data['code']."` ADD  `".I('code')."` TEXT NOT NULL";break;	  
	 }
	 
/*	 dump($query);
	 dump($Mtable->query($query));exit; */
	$Mtable->query($query);
	 
	 
	 //更新附表结构   
	 if($count)
	 	$this->success(L('lan_addsuccess'));

	   
   }
   //自定义字段修改
   public function fieldedit()
   {
	 $id=I('id');

	 $strfield=M('field')->find($id);
	 $this->assign('strfield',$strfield);


	$Mtable=D('Mtable');
	$data=$Mtable->find($strfield['mid']);
	$this->assign('data',$data);

	 
	 $this->display();  
	} 
 //自定义字段修改	
  public function do_fieldedit()
  {
     //自定义字段
     $id=I('id');
	 $dataf=M('Field')->find($id);
	 $Mtable=D('Mtable');
     $data=$Mtable->find($dataf['mid']);

	  switch (I("type"))
	  {
		case "int": 
		$query="ALTER TABLE  `".C('DB_PREFIX').$data['code']."` CHANGE  `".I('code')."`  `".I('code')."` INT( ".I('length')." ) NOT NULL DEFAULT  '0'";break;
		case "varchar":
		$query="ALTER TABLE  `".C('DB_PREFIX').$data['code']."` CHANGE  `".I('code')."`  `".I('code')."` VARCHAR(  ".I('length')." ) NOT NULL ";break;
		case "text":
		$query="ALTER TABLE  `".C('DB_PREFIX').$data['code']."` CHANGE  `".I('code')."`  `".I('code')."` TEXT NOT NULL ";break;
		case "time": 
		$query="ALTER TABLE  `".C('DB_PREFIX').$data['code']."` CHANGE  `".I('code')."`  `".I('code')."` INT( ".I('length')." ) NOT NULL DEFAULT  '0'";break;
		case "edit":
		$query="ALTER TABLE  `".C('DB_PREFIX').$data['code']."` CHANGE  `".I('code')."`  `".I('code')."` TEXT NOT NULL ";break;  
		  
	  } 
	
	 $Mtable->query($query);

     //字段更新
  $dataup=array(
  'name'=>I('name'),
  'type'=>I('type'),
  'code'=>I('code'),
  'length'=>I('length'),
  	);


	M('field')->where(array('id'=>I('id')))->save($dataup);
	$this->success(L('lan_editsuccess'),U(GROUP_NAME.'/Mtable/fieldlist',array('id'=>$dataf['mid'])));
	  
  }	
	
   //自定义字段删除
   public function fielddel()
   {

     $id=I('id');
	 $dataf=M('Field')->find($id);
	 $Mtable=D('Mtable');
     $data=$Mtable->find($dataf['mid']);
      
	 $query="ALTER TABLE  `".C('DB_PREFIX').$data['code']."` DROP  `".$dataf['code']."`";
	 $Mtable->query($query);
	 
     if(M('Field')->delete($id))
       $this->success(L('lan_delsuccess'),U(GROUP_NAME.'/Mtable/fieldlist',array('id'=>$dataf['mid'])));
	 else
	   $this->success(L('lan_delfailed'));
     }  
 
   //获得自定义字段
   private function getfields($id)
   {
	 $Mtable=D('Mtable');
	 $data=$Mtable->find($id);
	 $lists=explode(',',$data['fieldlist']);//多个字段是以逗号隔开的
	 for($i=0;$i<count($lists);$i++)
	 {
		$temp1=explode('|',$lists[$i]);//字段的信息 字段名称|字段类型#字段长度
		$temp2=explode('#',$temp1[1]);
		$fields[$i]=array('code'=>$temp1[0],'name'=>$temp2[0],'type'=>$temp2[1],'length'=>$temp2[2]);
	 }

	 return $fields;
	   
   }
}
?>