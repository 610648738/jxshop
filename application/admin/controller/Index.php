<?php 
namespace app\admin\controller;
/**
* 后台首页
*/
class Index extends Common
{
	
	public function index()
	{
		return $this->fetch();
	}

	public function top()
	{
		return $this->fetch();
	}

	public function main()
	{
		return $this->fetch();
	}

	public function menu()
	{
		return $this->fetch();
	}
}