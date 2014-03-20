<?php
//角色访问控制器
Class RbacAction extends CommonAction
{
	//管理员列表
	public function user()
	{
		
	  $User=D('User');
	  import('ORG.Util.Page');
	  
	  $where['groupid']=1;
	  $count= $User->Relation('Role')->where($where)->count();
	  $Page= new Page($count,25);
	  $show= $Page->show();
	  $list= $User->Relation('Role')->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
	  $this->assign('lists',$list);

	  $this->assign('page',$show);
	  $this->display(); 
	 
	}
	/**
   * 用户添加
   */
  public function addUser()
  {
  	$Role=D('Role');
  	$datag=$Role->where(array('status'=>1))->select();
    $this->assign('datag',$datag);
    $this->display();
  }
	public function do_addUser()
    {
  	if(!IS_POST) _404(L('lan_common'));
    $User=D('User');
    if($User->create())
    {
    	if($uid=$User->add())
    	{
		  	
		  foreach(I('role') as $r)
		  {  
			if($r) 
			 $role[]=array(
			    'role_id'=>$r,
				'user_id'=>$uid
			 ); 
		  }	
		  M('role_user')->addAll($role);
		  $this->success(L('lan_addc'),U('user'));
		}
    	else
    	{
		  $this->error(L('lan_error'));
		}
    }
    else
    	$this->error($User->getError());
    }
	
	
	/**
  * 修改用户资料
  * @return [type] [description]
  */
 public function edituser()
 {
 	$id=I('id');
 	$User=D('User');
 	$data=$User->relation('Role')->find($id);
	//dump($data);
 	$this->assign('data',$data);
 	$Role=D('Role');
  	$this->datag=$Role->select();


	
	$this->display();
 }
 public function do_edituser()
 {
 	if(!IS_POST) _404(L('lan_common'));
 	$User=D('User');
 	if(!I('password'))
 	 {
		unset($_POST['password']);
		unset($_POST['repassword']);
 	 }
              else
              {
              	$_POST['password']=md5(I('password'));
		$_POST['repassword']=md5(I('repassword'));
              }
 	if($User->create())
 	{
 		
 		if($User->where(array('id'=>I('id')))->save())
 		{
		  M('role_user')->where(array('user_id'=>I('id')))->delete();
 		  foreach(I('role') as $r)
		  {  
			if($r) 
			 $role[]=array(
			    'role_id'=>$r,
				'user_id'=>I('id')
			 ); 
		  }	
		  M('role_user')->addAll($role);
 		  $this->success(L('lan_edit'),U('user'));
 		}
 		else
 		{
 		
 			$this->error(L('lan_error'));
 		}
 	}
 	else
 		$this->error($User->getError());
 }
 
 public function delUser()
 {
	$User=D('User');
	$id=I('id');
    M('role_user')->where(array('user_id'=>$id))->delete();
	if($User->delete($id))
	  $this->success(L('lan_del'));
	else
	  $this->error(L('lan_error')); 
 }
	
	
	
	//节点列表
	public function node()
	{
	  $Node=D('Node');
	  $field="id,pid,title,status";
	  $lists=$Node->order('sort asc')->getfield($field);
	  $this->lists=node_merge($lists);
	  //dump($this->lists);
	  $this->display();
	 
	}
	
	public function addNode()
	{
		
		$this->pid=I('pid',0,'intval');
		$this->level=I('level',1,'intval');
		switch($this->level)
		{
		
		  case "1": $this->node='应用';break;
		  case "2": $this->node='控制器';break;
		  case "3": $this->node='方法';break;
	
		}
		$this->display();
	   	
    }
	public function  do_addNode()
	{
	 $Node=D('Node');
	 if($Node->create())
	 {
		 if($Node->add())
	     {
			 $this->success('节点添加成功',U(GROUP_NAME.'/Rbac/node'));
		 }
		 else
		 {
	       $this->error('请重试');
		 }
	 }
	 else
	 {
	   $this->error($Node->getError());
	  }
	
	}
	 //修改
	 public function editNode()
	 {
       
	   $this->data=D('Node')->find(I('id'));
	   switch($this->data['level'])
		{
		
		  case "1": $this->node='应用';break;
		  case "2": $this->node='控制器';break;
		  case "3": $this->node='方法';break;
	
		}
	   $this->display();
	 }
	 public function do_editNode()
	 {
	    $Node=D('Node');
		if($Node->create())
		{
		  $Node->save();
		  $this->success('节点编辑成功',U(GROUP_NAME.'/Rbac/node'));
		}
	    else
		{
		  $this->error($Node->getError());
		}
	 }
	 //删除
	 public function delNode()
     {
	   
	   $child=node_child(I('id'));
	   $flag=false;
	   foreach($child as $c)
	   {
		  if(M('Node')->delete($c))	 
		  {
			 $flag=true; 
		  }
		  else
		  {
			 break;
		  }	 
		}
		if($flag)
		  $this->success('节点删除成功',U(GROUP_NAME.'/Rbac/node'));
		else
		  $this->error('请重试');
	 }
	
	//角色列表
	public function role()
	{
	   $Role=D('Role');
	   $this->lists=$Role->select();
	   $this->display();
	
	}

	
	//添加角色
	public function addRole()
	{
		$this->display();
	
	}
	public function do_addRole()
	{
	
	  $Role=D('Role');
	  if($Role->create())
	  {
	  	if($Role->add())
		{
		  $this->success('角色添加成功',U(GROUP_NAME.'/Rbac/role'));	
			
		}
		else
		{
		  $this->error('请重试');
		}
	  }
	  else
	  {
	    $this->error($Role->getError());
	  }
	}
   public function editRole()
   {
	$Role=D('Role');
	$id=I('id');
	$this->data=$Role->where(array('id'=>$id))->find();
	$this->display();  
   }
   public function do_editRole()
   {
   
     $Role=D('Role');
	 
	 if($Role->create())
	 {
		 if($Role->save())
		 {
		   $this->success('角色编辑成功',U(GROUP_NAME.'/Rbac/role'));	
		 }
		 else
		 {
		  $this->error('请重试');
		 }
	 }
	 else
	 {
		$this->error($Role->getError());	 
	 }
	 
	 
	 
   }
   
   //删除角色
   public function delRole()
  {
	$Role=D('Role');
	$id=I('id');
    M('role_user')->where(array('role_id'=>$id))->delete();
	if($Role->delete($id))
	  $this->success(L('lan_del'));
	else
	  $this->error(L('lan_error')); 
   }
	
	
   
   //分配权限
   public function addAccess()
   {
	  
	  $Node=D('Node');
	  $field="id,pid,title";
	  $role_id=I('id');
	  $access=M('Access')->where(array('role_id'=>$role_id))->getfield('node_id',true);
	 
	  
	  $lists=$Node->where(array('status'=>1))->order('sort')->getfield($field);
	  $this->lists=node_merge($lists,$access);
	   //dump( $this->lists);
	  $this->display();
	   
  }
  public function do_addAccess()
  {
	
	$access=I('access');
	$role_id=I("role_id");
	M('Access')->where(array('role_id'=>$role_id))->delete();
	foreach($access as $a)
	{
	  $tmp=explode('_',$a);	
	  $data[]=array(
	  
	     'node_id'=>$tmp[0],
		 'role_id'=>$role_id,
		 'level'=>$tmp[1]
	  );	
	  
	}
//dump($data);exit();
	if(M('Access')->addAll($data))
    {
		
		$this->success('权限分配成功',U(GROUP_NAME.'/Rbac/role'));
		
	}
	else
	{
	
	$this->error('请重试');
	}
	  
  }
   
   
	
}
?>