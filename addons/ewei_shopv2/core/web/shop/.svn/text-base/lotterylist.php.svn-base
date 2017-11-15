<?php
if (!(defined('IN_IA'))) {
	exit('Access Denied');
}
class Lotterylist_EweiShopV2Page extends WebPage {
	public function main() {
		global $_W;
		global $_GPC;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 20;
		$condition = ' and 1';
		if ($_GPC['prize'] != '') {
			$condition .= ' and prize=' . intval($_GPC['prize']);
		}
		if (!(empty($_GPC['keyword']))) {
			$_GPC['keyword'] = trim($_GPC['keyword']);
			$condition .= ' and mobile  like "%' . $_GPC['keyword'] . '%"';
		}
		$list = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_lotterylist') . ' WHERE 1 ' . $condition . '  ORDER BY id DESC limit ' . (($pindex - 1) * $psize) . ',' . $psize);
		$total = pdo_fetchcolumn('SELECT count(*) FROM ' . tablename('ewei_shop_lotterylist') . ' WHERE 1 ' . $condition);
		foreach ($list as $key => $value) {
			$member = m('member') -> getMember($value['openid']);
			$list[$key]['realname'] = $member['realname'];
			$list[$key]['mobile'] = $member['mobile'];
			$list[$key]['address'] = $member['address'];
			if ($value['prize'] == 1) {
				$list[$key]['prize'] = '一等奖';
				$list[$key]['prizename'] = 'JBL电视音响一个';
			}
			if ($value['prize'] == 2) {
				$list[$key]['prize'] = '二等奖';
				$list[$key]['prizename'] = '便携式防水蓝牙音响';
			}
			if ($value['prize'] == 3) {
				$list[$key]['prize'] = '三等奖';
				$list[$key]['prizename'] = 'C罗或梅西球衣一件';
			}
			if ($value['prize'] == 4) {
				$list[$key]['prize'] = '特等奖';
				$list[$key]['prizename'] = '欧洲足球之旅';
			}
			if ($value['prize'] == 5) {
				$list[$key]['prize'] = '未中奖';
				$list[$key]['prizename'] = '无';
			}
		}
		$pager = pagination($total, $pindex, $psize);
		include $this -> template();
	}

	public function export() {
		$list=pdo_getall('ewei_shop_lotterylist');
		foreach ($list as $key => $value) {
			$member = m('member') -> getMember($value['openid']);
			$list[$key]['realname'] = $member['realname'];
			$list[$key]['mobile'] = $member['mobile'];
			$list[$key]['address'] = $member['address'];
			if ($value['prize'] == 1) {
				$list[$key]['prize'] = '一等奖';
				$list[$key]['prizename'] = 'JBL电视音响一个';
			}
			if ($value['prize'] == 2) {
				$list[$key]['prize'] = '二等奖';
				$list[$key]['prizename'] = '便携式防水蓝牙音响';
			}
			if ($value['prize'] == 3) {
				$list[$key]['prize'] = '三等奖';
				$list[$key]['prizename'] = 'C罗或梅西球衣一件';
			}
			if ($value['prize'] == 4) {
				$list[$key]['prize'] = '特等奖';
				$list[$key]['prizename'] = '欧洲足球之旅';
			}
			if ($value['prize'] == 5) {
				$list[$key]['prize'] = '未中奖';
				$list[$key]['prizename'] = '无';
			}
			$list[$key]['addtime'] =date('Y-m-d H:i:s',$list[$key]['addtime']);
		}

		m('excel') -> export($list, array('title' => '中奖数据-' . date('Y-m-d-H-i', time()), 'columns' => array( array('title' => '用户', 'field' => 'realname', 'width' => 12), array('title' => '手机号', 'field' => 'mobile', 'width' => 12), array('title' => '详细地址', 'field' => 'address', 'width' => 24), array('title' => '奖项', 'field' => 'prize', 'width' => 12), array('title' => '奖品', 'field' => 'prizename', 'width' => 12), array('title' => '时间', 'field' => 'addtime', 'width' => 12))));

	}

	public function add() {
		$this -> post();
	}

	public function edit() {
		$this -> post();
	}

	public function delete() {
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		if (empty($id)) {
			$id = ((is_array($_GPC['ids']) ? implode(',', $_GPC['ids']) : 0));
		}
		$items = pdo_fetchall('SELECT  * FROM ' . tablename('ewei_shop_lotterylist') . ' WHERE id in( ' . $id . ' )');
		foreach ($items as $item) {
			pdo_delete('ewei_shop_lotterylist', array('id' => $item['id']));
		}
		show_json(1, array('url' => referer()));
	}

	public function displayorder() {
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		$displayorder = intval($_GPC['value']);
		$item = pdo_fetchall('SELECT id,advname FROM ' . tablename('ewei_shop_adv') . ' WHERE id in( ' . $id . ' ) AND uniacid=' . $_W['uniacid']);
		if (!(empty($item))) {
			pdo_update('ewei_shop_adv', array('displayorder' => $displayorder), array('id' => $id));
			plog('shop.adv.edit', '修改幻灯片排序 ID: ' . $item['id'] . ' 标题: ' . $item['advname'] . ' 排序: ' . $displayorder . ' ');
		}
		show_json(1);
	}

	public function enabled() {
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		if (empty($id)) {
			$id = ((is_array($_GPC['ids']) ? implode(',', $_GPC['ids']) : 0));
		}
		$items = pdo_fetchall('SELECT id,advname FROM ' . tablename('ewei_shop_adv') . ' WHERE id in( ' . $id . ' ) AND uniacid=' . $_W['uniacid']);
		foreach ($items as $item) {
			pdo_update('ewei_shop_adv', array('enabled' => intval($_GPC['enabled'])), array('id' => $item['id']));
			plog('shop.adv.edit', (('修改幻灯片状态<br/>ID: ' . $item['id'] . '<br/>标题: ' . $item['advname'] . '<br/>状态: ' . $_GPC['enabled']) == 1 ? '显示' : '隐藏'));
		}
		show_json(1, array('url' => referer()));
	}

}
?>