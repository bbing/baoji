<?php

Class CommonAction extends Action
{
 Public function _initialize()
 {
  import('@.Common.Users');
  $Users=new Users();

  if(!$Users->islogin())
  {
  	$this->redirect(GROUP_NAME.'/Login/index');
  }
  
  $notAuth=in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE')))||
	in_array(ACTTION_NAME,explode(',',C('NOT_AUTH_ACTION')));
  
  if(C('USER_AUTH_ON') && !$notAuth)
  {
	import('ORG.Util.RBAC');
    RBAC::AccessDecision(GROUP_NAME)||$this->error('没有权限');
  }
  

}
Public function verify(){
    import('ORG.Util.Image');
    Image::buildImageVerify();
}


//编辑器图片上传处理
  Public function Upload()
  {
    import('ORG.Net.UploadFile');
    $upload=New UploadFile();
    $upload->autoSub=true;
    $upload->subType='date';
    $upload->dateFormat='Ym';
    if($upload->upload('./'.C('cfg_pic')))
    {
      $info=$upload->getUploadFileInfo();
      if(C('WATER_OPEN'))
      {
         import('Class.Image',APP_PATH);
         Image::water('./'.C('cfg_pic').$info[0]['savename']);
      }
      if(C('WATER_OPEN_FONT'))
      {
         import('Class.Image',APP_PATH);
         Image::text('./'.C('cfg_pic').$info[0]['savename'],C('WATER_TEXT'));
      }
      echo json_encode(array(
      'url'=>$info[0]['savename'],
      'title'=>htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
      'original'=>$info[0]['name'],
      'state'=>'SUCCESS'
      ));
    }
    else
    {
      echo json_encode(array('state'=>$upload->getErrorMsg()));
    }
  
  
  }
    //在线图片管理
    public function ImgManger()
    {

    $paths = array('Public/Uploads');

    $action = htmlspecialchars( $_POST[ "action" ] );
    if ( $action == "get" ) 
    {
        $files = array();
        foreach ( $paths as $path)
        {
            $tmp = $this->getfiles( $path );
            if($tmp)
            {
                $files = array_merge($files,$tmp);
            }
        }
        if ( !count($files) ) return;
        rsort($files,SORT_STRING);
        $str = "";
        foreach ( $files as $file ) 
        {
            $str .= $file . "ue_separate_ue";
        }
        echo $str;
    }

    }

    /**
     * 遍历获取目录下的指定类型的文件
     * @param $path
     * @param array $files
     * @return array
     */
    private function getfiles( $path , &$files = array() )
    {
        if ( !is_dir( $path ) ) return null;
        $handle = opendir( $path );
        while ( false !== ( $file = readdir( $handle ) ) ) {
            if ( $file != '.' && $file != '..' ) {
                $path2 = $path . '/' . $file;
                if ( is_dir( $path2 ) ) {
                    $this->getfiles( $path2 , $files );
                } else {
                    if ( preg_match( "/\.(gif|jpeg|jpg|png|bmp)$/i" , $file ) ) {
                        $files[] = $path2;
                    }
                }
            }
        }
        return $files;
    }


}
?>