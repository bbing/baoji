<?php
//文档属性
Class AttrAction extends Action{
  //文档属性视图
  public function index()
  {
    $this->attr=M('Attr')->select();
	$this->display(); 
  }

  //文档属性添加表单
  public function add()
  {
  	 $this->display();
  }
  //文档属性添加表单处理
  public function do_add()
  {
  	if(!I('name'))
  		$this->error('请填写属性名称');
  	$data=array(
  		'name'=>I('name'),
  		'color'=>I('color','black'),
  		);
  	if(M('attr')->add($data))
  		$this->success('文档属性添加成功',U(GROUP_NAME."/Attr/index"));
  	else
  		$this->error('请重试');
  }

  //文档属性修改表单
  public function edit()
  {
  	$id=I('id');
  	$data=M('attr')->find($id);
  	$this->data=$data;
  	$this->display();
  }
  //文档属性修改表单处理
  public function do_edit()
  {
  	if(!I('name'))
  		$this->error('请填写属性名称');
  	$data=array(
  		'name'=>I('name'),
  		'color'=>I('color','black'),
  		'id'=>I('id')
  		);
  	M('attr')->save($data);
  	$this->success('文档属性修改成功',U(GROUP_NAME."/Attr/index"));
  }

  //文档属性删除
  public function del()
  {
  	if(M('attr')->delete(I('id')))
  	{
  		$this->success('文档属性删除成功',U(GROUP_NAME."/Attr/index"));
  	}
  	else
  	{
  		$this->error('请重试');
  	}
  }
}
?>