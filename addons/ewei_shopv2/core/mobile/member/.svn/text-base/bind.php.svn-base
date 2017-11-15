<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Bind_EweiShopV2Page extends MobileLoginPage 
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
		@session_start();
		$member = m('member')->getMember($_W['openid']);
		if($_W['ispost']){
			//检查用户是否已经已经参与过.
			$onelottery=pdo_get('ewei_shop_lotterylist',array('openid'=>$_W['openid']));
			if($onelottery){
				show_json(0,'您已经参与过抽奖活动!');
			}
			$onelottery=pdo_get('ewei_shop_orderlist',array('openid'=>$_W['openid']));
			if($onelottery){
				show_json(0,'您已经参与过抽奖活动!');
			}			
						
			$data=array(
				'realname'=>$_GPC['realname'],
				'mobile'  =>$_GPC['mobile'],
				'address'  =>$_GPC['address']			
			);
			
			//绑定用户信息
			pdo_update('ewei_shop_member',$data,array('openid'=>$_W['openid']));
			
			$data['receipt']=$_COOKIE['filename'];			
			$data['addtime']=time();
			$data['openid']=$_W['openid'];
						
			//新增订单
			if(pdo_insert('ewei_shop_orderlist',$data)){
				show_json(1,'true');
			}
			else{
				show_json(0,'服务器提交订单信息失败!');				
			}
		}
		include $this->template();
	}

}
?>