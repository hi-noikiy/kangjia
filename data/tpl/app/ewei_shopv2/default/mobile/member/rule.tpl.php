<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
		<title>抽奖规则</title>
		<link rel="stylesheet" type="text/css" href="/kangjia/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="/kangjia/css/index.css"/>
	</head>
	<body>
		<img class="main-img" src="/kangjia/img/main_img.png"/>
		<img src="/kangjia/img/watch_ball.png" class="ball-tips" />
		<img src="/kangjia/img/ball_bg.png" class="rule-title" style="margin-top: -5px;" />
		<div class="rule-content" style="height: 170px;">
			<div id="wrapper" style="height: 100%; border: 1px solid #666; overflow: hidden;">
				<div id="scroller" class="wrap">
					<?php  echo $wap['rule'];?>
				</div>
			</div>
		</div>
		<img src="/kangjia/img/back.png" class="index-btn" onclick='window.location.href="<?php  echo mobileUrl();?>"'/>
		<script src="/kangjia/js/common.js"></script>
		<script src="/kangjia/js/iscroll.js"></script>
		<script type="text/javascript">
			new IScroll('#wrapper', {
				bounceLock: true
			});
		</script>
	</body>
</html>
