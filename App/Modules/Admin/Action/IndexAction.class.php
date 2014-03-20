<?php
/**
 * 后台首页控制器
 */
class IndexAction extends CommonAction 
{
    public function index()
    {
    	$this->display();
    }
    public function top()
    {
    	//顶部菜单
    	$topmenu=array(
    		 array('name'=>L('lan_config_common'),'url'=>U(GROUP_NAME.'/Index/left',array('sys'=>1))),
    		 array('name'=>L('lan_config_user'),'url'=>U(GROUP_NAME.'/Index/left',array('sys'=>2))),
    		 array('name'=>L('lan_config_feedback'),'url'=>U(GROUP_NAME.'/Index/left',array('sys'=>3))),
    		 array('name'=>L('lan_config_sysconfig'),'url'=>U(GROUP_NAME.'/Index/left',array('sys'=>4))),
    		);
    	$this->assign('topmenu',$topmenu);
    	$this->display();
    }
    public function left()
    {
    	//左侧菜单
    	$sys=I('sys');
    	if($sys=='')
    		$sys=1;
    	switch($sys)
    	{
    		case '1':$menu=array(
    						array(
    							'name'=>L('lan_common_oprea'),
    							'menu'=>array(
    								  array('name'=>L('lan_common_category'),'url'=>U(GROUP_NAME.'/Category/index')),
    					   			 
    					   			  array('name'=>L('lan_common_comment'),'url'=>U(GROUP_NAME.'/Comment/index')),

    								),
    							),
                            array(
                                'name'=>'文档属性',
                                'menu'=>array(
                                      array('name'=>'属性列表','url'=>U(GROUP_NAME.'/Attr/index')),
                                     
                                      array('name'=>"添加属性",'url'=>U(GROUP_NAME.'/Attr/add')),
                                    
                                    ),
                                ),
    					    array(
    							'name'=>L('lan_config_pic'),
    							'menu'=>array(
    								  array('name'=>L('lan_pic_category'),'url'=>U(GROUP_NAME.'/Imgcategory/index')),
    					   			  array('name'=>L('lan_pic_list'),'url'=>U(GROUP_NAME.'/Img/index')),
    								),
    							),
    			);
				//栏目内容管理
				$emenu[2]['name']='内容管理';
				$Category=D('Category');
				$data=$Category->where(array('reid'=>'0'))->select();
				foreach($data as $d)
				{
				  $id=$d['id'];
				  $cmenu[$id]['name']=$d['typename'];
				  $cmenu[$id]['url']=U(GROUP_NAME.'/Article/index',array('typeid'=>$d['id']));	
				}
				$emenu[2]['menu']=$cmenu;
				$menu=array_merge($menu,$emenu);
				break;
    		case '2':$menu=array(
    			           array(
    			           		'name'=>L('lan_config_user'),
    					        'menu'=>array(
    					   			  array('name'=>L('lan_user_list'),'url'=>U(GROUP_NAME.'/User/index')),
    								  array('name'=>L('lan_user_level'),'url'=>U(GROUP_NAME.'/Grade/index')),
    						 		  /*array('name'=>L('lan_user_score'),'url'=>U(GROUP_NAME.'/Score/index')),*/
    					   	 ),
    			           	),		   
    			);break;
    		case '3':$menu=array(
    			           array(
    			           	'name'=>L('lan_config_feedback'),
    					    'menu'=>array(
    					   			  array('name'=>L('lan_config_feedback'),'url'=>U(GROUP_NAME.'/Feedback/index')),
    			           	 ),
    					   	),
    			);break;
    		case '4':$menu=array(
    					   array(
    					   		'name'=>L('lan_setting'),
    					   		'menu'=>array(
    					   			  array('name'=>L('lan_sysconfig_config'),'url'=>U(GROUP_NAME.'/Config/index')),
    					   			  array('name'=>L('lan_sysconfig_code'),'url'=>U(GROUP_NAME.'/Codeconfig/index')),
    					   			  array('name'=>L('lan_sysconfig_pic'),'url'=>U(GROUP_NAME.'/Imgconfig/index')),
									  
    					   				),
    					   	),
    					   array(
    					   		'name'=>L('lan_admin_config'),
    					   		'menu'=>array(
    					   			  array('name'=>L('lan_admin_list'),'url'=>U(GROUP_NAME.'/Rbac/user')),
    					   			  array('name'=>L('lan_admin_group'),'url'=>U(GROUP_NAME.'/Rbac/role')),
									  array('name'=>'节点列表','url'=>U(GROUP_NAME.'/Rbac/node')),
									  array('name'=>'添加管理员','url'=>U(GROUP_NAME.'/Rbac/addUser')),
									  array('name'=>'添加角色','url'=>U(GROUP_NAME.'/Rbac/addRole')),
									  array('name'=>'添加节点','url'=>U(GROUP_NAME.'/Rbac/addNode')),
    					   	         ),
    					   	),
                             array(
                                'name'=>L('lan_mode_config'),
                                'menu'=>array(
                                      array('name'=>L('lan_mode_list'),'url'=>U(GROUP_NAME.'/mtable/index')),
                                     ),
                            ),	
    			);break;
    	}
    	$this->assign('menu',$menu);
    	$this->display();
    }
    public function main()
    {
		
		//获取服务器信息
        $sysdata['sysos'] = $_SERVER["SERVER_SOFTWARE"]; //获取服务器标识的字串
        $sysdata['sysversion'] = PHP_VERSION; //获取PHP服务器版本
        //以下两条代码连接MySQL数据库并获取MySQL数据库版本信息
        /*  mysql_connect("localhost", "mysql_user", "mysql_pass");
        $mysqlinfo = mysql_get_server_info();*/
        //从服务器中获取GD库的信息
        if(function_exists("gd_info")){ 
        $gd = gd_info();
        $sysdata['gdinfo'] = $gd['GD Version'];
        }else {
        $sysdata['gdinfo'] = "未知";
        }
        //从GD库中查看是否支持FreeType字体
        $sysdata['freetype'] = $gd["FreeType Support"] ? "支持" : "不支持";
        //从PHP配置文件中获得是否可以远程文件获取
        $sysdata['allowurl']= ini_get("allow_url_fopen") ? "支持" : "不支持";
        //从PHP配置文件中获得最大上传限制
        $sysdata['max_upload'] = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled";
        //从PHP配置文件中获得脚本的最大执行时间
        $sysdata['max_ex_time']= ini_get("max_execution_time")."秒";
        //以下两条获取服务器时间，中国大陆采用的是东八区的时间,设置时区写成Etc/GMT-8
        date_default_timezone_set("Etc/GMT-8");
        $sysdata['systemtime'] = date("Y-m-d H:i:s",time()); 
        $this->assign('sysdata',$sysdata);
    	$this->display();
    }
}