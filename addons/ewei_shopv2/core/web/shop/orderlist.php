<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Orderlist_EweiShopV2Page extends WebPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 20;
		$condition = ' and 1';
		if ($_GPC['enabled'] != '') 
		{
			$condition .= ' and enabled=' . intval($_GPC['enabled']);
		}
		if (!(empty($_GPC['keyword']))) 
		{
			$_GPC['keyword'] = trim($_GPC['keyword']);
			$condition .= ' and mobile  like "%'.$_GPC['keyword'].'%"';
		}
		$list = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_orderlist') . ' WHERE 1 ' . $condition . '  ORDER BY id DESC limit ' . (($pindex - 1) * $psize) . ',' . $psize);
		$total = pdo_fetchcolumn('SELECT count(*) FROM ' . tablename('ewei_shop_orderlist') . ' WHERE 1 ' . $condition);
		$pager = pagination($total, $pindex, $psize);
		include $this->template();
	}
	public function add() 
	{
		$this->post();
	}
	public function edit() 
	{
		$this->post();
	}
	protected function post() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		if ($_W['ispost']) 
		{
			pdo_update('ewei_shop_orderlist',array('enabled'=>$_GPC['enabled']),array('id'=>$id));
			
			//设为异常,删除用户的中奖信息,并且恢复对应奖项的次数,同时通知用户
			if($_GPC['enabled']!=1){

					$data = array(
						'first' => array('value' => '系统通知:您参与的活动因提交的订单异常,奖项名额已经取消,有疑问请联系活动客服!', 'color' => '#4a5077'), 
					);	
					pdo_update('ewei_shop_lotterylist',array('prize'=>5),array('openid'=>$_GPC['openid']));		
					m('message') -> sendCustomNotice($_GPC['openid'], $data, NULL);								
			}
			
			show_json(1, array('url' => webUrl('shop/orderlist')));
		}
		$item = pdo_fetch('select * from ' . tablename('ewei_shop_orderlist') . ' where id=:id  limit 1', array(':id' => $id));
		include $this->template();
	}
	public function delete() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		if (empty($id)) 
		{
			$id = ((is_array($_GPC['ids']) ? implode(',', $_GPC['ids']) : 0));
		}
		$items = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_orderlist') . ' WHERE id in( ' . $id . ' )');
		
		foreach ($items as $item ) 
		{
			pdo_delete('ewei_shop_orderlist', array('id' => $item['id']));
			
		}
		show_json(1, array('url' => referer()));
	}
	public function displayorder() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		$displayorder = intval($_GPC['value']);
		$item = pdo_fetchall('SELECT id,advname FROM ' . tablename('ewei_shop_adv') . ' WHERE id in( ' . $id . ' ) AND uniacid=' . $_W['uniacid']);
		if (!(empty($item))) 
		{
			pdo_update('ewei_shop_adv', array('displayorder' => $displayorder), array('id' => $id));
			plog('shop.adv.edit', '修改幻灯片排序 ID: ' . $item['id'] . ' 标题: ' . $item['advname'] . ' 排序: ' . $displayorder . ' ');
		}
		show_json(1);
	}
	public function enabled() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		if (empty($id)) 
		{
			$id = ((is_array($_GPC['ids']) ? implode(',', $_GPC['ids']) : 0));
		}
		$items = pdo_fetchall('SELECT id,advname FROM ' . tablename('ewei_shop_adv') . ' WHERE id in( ' . $id . ' ) AND uniacid=' . $_W['uniacid']);
		foreach ($items as $item ) 
		{
			pdo_update('ewei_shop_adv', array('enabled' => intval($_GPC['enabled'])), array('id' => $item['id']));
			plog('shop.adv.edit', (('修改幻灯片状态<br/>ID: ' . $item['id'] . '<br/>标题: ' . $item['advname'] . '<br/>状态: ' . $_GPC['enabled']) == 1 ? '显示' : '隐藏'));
		}
		show_json(1, array('url' => referer()));
	}
}
?>