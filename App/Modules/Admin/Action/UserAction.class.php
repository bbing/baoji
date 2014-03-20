<?php


Class UserAction extends CommonAction
{
	
  public function index()
  {
	$User=D('User');
	$where['groupid']=2;
	$order['id']='desc';
	import('ORG.Util.Page');
	
	//条件筛选
	$grade_id=I('grade_id');
	$key=I('key');
   

	if($grade_id)
	{   
	  $where['grade_id']=$grade_id;	
	  $this->gradename=M('Grade')->find($grade_id);
	  $this->grade_id=$grade_id;

	}
	if($key)
	{	
	  $where['username']=array('like','%'.$key.'%');	
    }
	
		
	$count= $User->relation('Grade')->where($where)->count();
	$Page= new Page($count,25);
	$show= $Page->show();
	$list= $User->relation('Grade')->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
	//dump($User->getlastsql());
	$this->assign('lists',$list);
	$this->assign('page',$show);
	
	
	//会员等级
	$this->grade=M('Grade')->select();
	//dump($this->grade);
	$this->display(); 
  }
  
  
   /**
   * 用户添加
   */
  public function add()
  {
    $this->datag=M('grade')->select();
    $this->display();
  }
  public function do_add()
  {
  	if(!IS_POST) _404(L('lan_common'));
    $User=D('User');
    if($User->create())
    {
    	if($User->add())
    		$this->success(L('lan_addc'),U('index'));
    	else
    		$this->error(L('lan_error'));
    }
    else
    	$this->error($User->getError());
  }
 /**
  * 修改用户资料
  * @return [type] [description]
  */
 public function edit()
 {
 	$id=I('id');
 	$User=D('User');
 	$data=$User->find($id);
 	$this->assign('data',$data);
 	$this->datag=M('grade')->select();
 	$this->display();
 }
 public function do_edit()
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
 		$whereup['id']==I('id');
 		if($User->where($whereup)->save())
 		{
 			
 			$this->success(L('lan_edit'),U('index'));
 		}
 		else
 		{
 		
 			$this->error(L('lan_error'));
 		}
 	}
 	else
 		$this->error($User->getError());
 }
 public function del()
 {
	$User=D('User');
	$id=I('id');

	if($User->delete($id))
	  $this->success(L('lan_del'));
	else
	  $this->error(L('lan_error')); 
 }
//检查栏目的名称是否相同
 public function checksame()
 {
   if(!IS_AJAX) _404(L('lan_common'),U(GROUP_NAME.'/Category/index'));
   $User=D('User');
   if($User->where(array("username"=>I('username')))->count())
      $this->ajaxReturn(array('status'=>1),'json');
   else
     $this->ajaxReturn(array('status'=>0),'json');
 }	
} 

?>