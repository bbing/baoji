<?php

Class ConfigAction extends CommonAction
{
  public function index()
  {
  	$Config=D('Config');
    $datalists=$Config->select();
    $datalists=Cate::unlimitedForLayer($datalists,'child');
    //dump($datalists);die;

    $this->assign('datalists',$datalists);
    $this->display();
  }
  public function edit_config()
  {
  	if(!IS_POST) _404(L('lan_common'),U(GROUP_NAME.'/Config/index'));
  	$Config=D('Config');
  	foreach(I('post.') as $k=>$v)
	{
	 //$k = preg_replace("#^edit___#", "", $k);
	 $data["content"]=$v;
	 $data["optime"]=time();
	 $where['name']=$k;
	 $count=$Config->where($where)->save($data);
	 $this->ReWriteConfig();
	}
    $this->success(L('lan_setsuccess'),U(GROUP_NAME.'/Config/index'));
  }
  public function add_config()
  {
  	if(!IS_POST) _404(l('lan_common'),U(GROUP_NAME.'/Config/index'));
 	$Config=D('Config');
 	if($Config->create())
 	 {
 		$lastid=$Config->add();
 		if($lastid)
			$this->success(L('lan_fieldsuccess'),U(GROUP_NAME.'/Config/index'));
 		else
 			$this->error(L('lan_fieldfailed'));
 	 }
 	 else
 	 {
 	 	$this->error($Config->getError());
 	 }
  }
  //更新配置文件webconfig文件的内容
  private function ReWriteConfig()
   {
	 $Config=D('Config');
	 $configpath = C('cfg_conf');
	 if(!is_writeable($configpath.'webconfig.php'))
	 {
	    $this->error(L('lan_config')."'{$configpath}webconfig.php'",U(GROUP_NAME.'/Config/index').L('lan_change'));
	 }
	 $datalists=$Config->order('id asc')->select();
	 foreach($datalists as $datalist)
	 {
	    $data[$datalist['name']]=$datalist['content'];
	 }
     F('webconfig',$data,$configpath);
	}
}

?>