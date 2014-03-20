<?php

Class Users
{
   private $userid;
   private $username;
   private $nickname;
   //保存session
   private $kuserid;
   private $kusername='username';
   private $knickname='nickname';
   /**
    *构造函数
    */
   public function __construct()
   {
	$this->kuserid=C('USER_AUTH_KEY');
   	if(session("?".$this->kuserid)&&session($this->kuserid)!='')
   		$this->userid=session($this->kuserid);
   	if(session($this->kusername)&&session($this->kusername)!='')
   		$this->username=session($this->kusername);
   	if(session($this->knickname)&&session($this->knickname)!='')
   		$this->nickname=session($this->knickname);
   }
   /**
    * 判断用户是否登陆
    * @return [type] [description]
    */
   public function islogin()
	 {
	 	if($this->userid!='')
	 		return true;
	 	else
	 		return false;
	 }
   /**
    * 会员的登陆
    * @param  [type] $username 用户名
    * @param  [type] $password 密码
    * @return [type]           [description]
    */
   public function login($username,$password)
   {
   	 $User=D('User');
   	 $where['username']=$username;
   	 $where['password']=md5($password);
   	 $data=$User->relation('Role')->where($where)->find();

	 //dump($User->getlastsql());exit();
     $flag=false;
   	 if($data)
   	 {
   	  //判断是否是系统管理员帐号
      if($data['groupid']==1)
       {
        //更新信息
        $dataup['lastlogintime']=time();
        $dataup['logintimes']=++$data['logintimes'];
        $dataup['loginip']=get_client_ip();
        $dataup['optime']=time();
        $count=$User->where(array('id'=>$data['id']))->save($dataup);
		
        if($count)
          $flag=true;
        //保存session
        session($this->kuserid,$data['id']);
        session($this->kusername,$data['username']);
        session($this->knickname,$data['nickname']);
		
       //超级管理员
		if(in_array(C('RBAC_SUPERADMIN'),getmark($data['Role'])))
		{
		  	session(C('ADMIN_AUTH_KEY'),true);

		}
		 
		//读取用户权限
		import('ORG.Util.RBAC');
		RBAC::saveAccessList();
		/*dump($_SESSION);exit();*/
       } 
   	 }
     return $flag;
   }

 public function loginout()
  {
    $this->userid="";
    $this->nickname="";
    $this->username="";
	session(null);
 /*   session($this->kuserid,null);
    session($this->knickname,null);
    session($this->kusername,null);
	session(C('ADMIN_AUTH_KEY'),null);*/
	
    return true;
  }
}

?>