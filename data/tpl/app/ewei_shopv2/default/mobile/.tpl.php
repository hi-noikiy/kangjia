<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="/kangjia/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="/kangjia/css/index.css"/>

	</head>
	<body>
		<img class="main-img" src="/kangjia/img/main_img.png"/>
		<img src="/kangjia/img/watch_ball.png" class="ball-tips" />
		<div class="wrad-list-wrap">
			<div class="wrad-list-title">
				<span class="name">姓名</span>
				<span class="phone">电话</span>
				<span class="ward">奖品</span>
			</div>
			<div class="wrad-list">
				<div id="wrapper" style="height: 100%;border: 1px solid #666; overflow: hidden;">
					<ul id="scroller" class="wrap">
						<?php  if(is_array($list)) { foreach($list as $item) { ?>
							<li>
								<span class="name"><?php  echo $item['realname'];?></span>
								<span class="phone"><?php  echo $item['mobile'];?></span>
								<span class="ward"><?php  echo $item['prizename'];?></span>
							</li>
						<?php  } } ?>
					</ul>
				</div>
			</div>
		</div>
		<?php  if($onelottery1!==false && $onelottery1['prize']<5) { ?>
			<a href="<?php  echo mobileurl('member.receive');?>"><img src="/kangjia/img/cj_btn.png" class="index-btn first" /></a>
		<?php  } else if($onelottery1['prize']==5  || $onelottery2) { ?>
			<a  onclick="Tools.toast('您已经参与过抽奖活动!');"  ><img src="/kangjia/img/cj_btn.png" class="index-btn first" /></a>
		<?php  } else { ?>
			<a href="<?php  echo mobileurl('shop/uploadreceipt');?>"><img src="/kangjia/img/cj_btn.png" class="index-btn first" /></a>
		<?php  } ?>
		
		<a href="<?php  echo mobileurl('member/rule'); ?>"><img src="/kangjia/img/gz_btn.png" class="index-btn"/></a>
		<script src="/kangjia/js/common.js"></script>
		<script type="text/javascript" src="/kangjia/js/iscroll.js"></script>
		<script src="/kangjia/js/jquery-1.8.3.min.js"></script>
		<script src="/kangjia/js/tools.js"></script>		
		<script type="text/javascript">
			document.addEventListener('DOMContentLoaded', function () {
				new IScroll('#wrapper', {
					bounceLock: true
				});
			}, false)
		</script>
	</body>
</html>
