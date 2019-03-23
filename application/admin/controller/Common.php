<?php
namespace app\admin\controller;
use think\Controller;
/**
* 公共控制器
*/
class Common extends Controller
{
	public $request;

	public function __construct()
	{
		parent::__construct();
		$this -> request = request();
	}
}