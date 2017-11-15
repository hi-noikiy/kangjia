<?php
if (!(defined('IN_IA'))) {
	exit('Access Denied');
}
class Scratch_EweiShopV2Page extends MobileLoginPage {
	public function main() {
		global $_W;
		global $_GPC;
		//1.检查用户是否已经已经参与过.
		$url = mobileurl('');
		$onelottery = pdo_get('ewei_shop_lotterylist', array('openid' => $_W['openid']));
		if ($onelottery) {
			header('Location: '.$url);
			exit();
		}
		//2.生成奖项的过程
		$fp = fopen("lock.txt", "r");
		//加锁
		if (flock($fp, LOCK_EX)) {
			$wap = m('common') -> getSysset('shop');//系统配置项目
			$arr = array( array('id' => 1, 'count' => $wap['one'], 'name' => '一等奖', 'v' => $wap['onerate']), array('id' => 2, 'count' => $wap['two'], 'name' => '二等奖', 'v' => $wap['tworate']), array('id' => 3, 'count' => $wap['three'], 'name' => '三等奖', 'v' => $wap['threerate']), array('id' => 4, 'count' => $wap['te'], 'name' => '特等奖', 'v' => $wap['terate']), array('id' => 5, 'count' => 100000000, 'name' => '未中奖', 'v' => $wap['weirate']));
			$res = $this -> getrand($arr);//预抽奖结果不代表最终结果
			
			//如果在预抽奖结果中奖,进行对比名额是否足够
			if ($res['id'] != 5) {
				$allres = pdo_getall('ewei_shop_lotterylist', array('prize' => $res['id']));//查询当前奖项在数据中的总条数
				$instate = true;
				//是否允许中奖
				if ($res['id'] == 1) {
					if (count($allres) >= $wap['one']) {$instate = false;}
				}
				if ($res['id'] == 2) {
					if (count($allres) >= $wap['two']) {$instate = false;}
				}
				if ($res['id'] == 3) {
					if (count($allres) >= $wap['three']) {$instate = false;}
				}
				if ($res['id'] == 4) {
					if (count($allres) >= $wap['te']) {$instate = false;}
				}
				if($instate!=true){
					$res['id'] = 5;
				}
								
			}
			pdo_insert('ewei_shop_lotterylist', array('openid' => $_W['openid'],'mobile'=>$member['mobile'],'prize' => $res['id'], 'addtime' => time()));
			//执行完成解锁
			flock($fp, LOCK_UN);
		}
		//关闭文件
		fclose($fp);
		$state=intval($res['id']);
		unset($res,$allres);
		include $this->template();
	}

	//生成中奖的概率算法(如中奖,但是奖项的名额不足,依然是未中奖)
	public function getrand($pro) {
		$result = array();
		foreach ($pro as $key => $value) {
			$arr[$key] = $value['v'];
		}
		asort($arr);
		$prosum = array_sum($arr);
		foreach ($arr as $key => $value) {
			$randNum = mt_rand(1, $prosum);
			if ($randNum <= $value) {
				$result = $pro[$key];
				break;
			} else {
				$prosum -= $value;
			}
		}
		return $result;
	}

}
?>