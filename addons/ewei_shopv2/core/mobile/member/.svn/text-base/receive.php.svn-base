<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Receive_EweiShopV2Page extends MobileLoginPage 
{
	protected $member;
	
	public  function  main(){
		global $_W;
		global $_GPC;
		$oneres=pdo_get('ewei_shop_lotterylist',array('openid'=>$_W['openid']));
			
		include $this->template();		
	}
}
?>