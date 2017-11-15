<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Rule_EweiShopV2Page extends MobileLoginPage 
{
	protected $member;
	public function __construct() 
	{
		global $_W;
		global $_GPC;
		parent::__construct();
	}
	public function main() 
	{
		global $_W;
		global $_GPC;

		$wap = m('common')->getSysset('shop');		
		$wap['rule']=htmlspecialchars_decode($wap['rule']);
		include $this->template();
	}



}
?>