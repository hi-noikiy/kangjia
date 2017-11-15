<?php
if (!(defined('IN_IA'))) {
	exit('Access Denied');
}
class Index_EweiShopV2Page extends MobilePage {
	public function main() {
		global $_W;
		global $_GPC;
		$this -> diypage('home');
		$uniacid = $_W['uniacid'];
		$mid = intval($_GPC['mid']);
		$index_cache = $this -> getpage();
		if (!(empty($mid))) {
			$index_cache = preg_replace_callback('/href=[\\\'"]?([^\\\'" ]+).*?[\\\'"]/', function($matches) use ($mid) {
				$preg = $matches[1];
				if (strexists($preg, 'mid=')) {
					return 'href=\'' . $preg . '\'';
				}
				if (!(strexists($preg, 'javascript'))) {
					$preg = preg_replace('/(&|\\?)mid=[\\d+]/', '', $preg);
					if (strexists($preg, '?')) {
						$newpreg = $preg . '&mid=' . $mid;
					} else {
						$newpreg = $preg . '?mid=' . $mid;
					}
					return 'href=\'' . $newpreg . '\'';
				}
			}, $index_cache);
		}
		$shop_data = m('common') -> getSysset('shop');
		
		//获取中奖信息(ajax分页)(未使用,因为首页前端有效果.)
		if($_W['ispost']){
			$pindex = max(1, intval($_GPC['page']));
			$psize = 1;
			$list = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_lotterylist') . '  ORDER BY id DESC limit ' . (($pindex - 1) * $psize) . ',' . $psize);
			$total = pdo_fetchcolumn('SELECT count(*) FROM ' . tablename('ewei_shop_lotterylist'));
			$pager = pagination($total, $pindex, $psize);
			show_json(1, array('list' => $list, 'total' => count($total)));			
		}
		
		//直接输出全部信息
		$list = pdo_fetchall('SELECT  a.id  as  id ,a.addtime as addtime,a.openid as openid,a.prize as prize,b.realname as realname,b.mobile as mobile,b.address as  address FROM '.tablename('ewei_shop_lotterylist').' as a left join '.tablename('ewei_shop_member').' as b  on    a.openid=b.openid  where a.prize<>5  order  by  id  desc ');
		
		foreach ($list as $key => $value) {
			if($value['prize']==1){
				$list[$key]['prizename']='JBL电视音响';
			}			
			if($value['prize']==2){
				$list[$key]['prizename']='便携式防水蓝牙音响';
			}
			if($value['prize']==3){
				$list[$key]['prizename']='C罗或梅西球衣';
			}
			if($value['prize']==4){
				$list[$key]['prizename']='欧洲足球之旅';
			}
            $list[$key]['mobile'] = substr($value['mobile'], 0, 3).'****'.substr($value['mobile'], 7);
            $list[$key]['realname'] = $this->substr_cut($value['realname']);

		}
		
		//检查用户是否已经已经参与过.
		$onelottery1=pdo_get('ewei_shop_lotterylist',array('openid'=>$_W['openid']));

		$onelottery2=pdo_get('ewei_shop_orderlist',array('openid'=>$_W['openid']));

		include $this -> template();
	}


    //将用户名进行处理，中间用星号表示
    public function substr_cut($user_name){

        //获取字符串长度
        $strlen = mb_strlen($user_name, 'utf-8');
        //如果字符创长度小于2，不做任何处理
        if($strlen<2){
            return $user_name;
        }else{
            //mb_substr — 获取字符串的部分
            $firstStr = mb_substr($user_name, 0, 1, 'utf-8');
            $lastStr = mb_substr($user_name, -1, 1, 'utf-8');
            //str_repeat — 重复一个字符串
            return $strlen == 2 ? $firstStr . str_repeat('*', mb_strlen($user_name, 'utf-8') - 1) : $firstStr . str_repeat("*", $strlen - 2) . $lastStr;
        }
    }

}
?>