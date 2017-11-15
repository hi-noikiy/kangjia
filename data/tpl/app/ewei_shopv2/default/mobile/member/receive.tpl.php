<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="/kangjia/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="/kangjia/css/index.css"/>
		
		<style type="text/css">
			body {
				background-image: url(/kangjia/img/wrad_main_bg.jpg);
			}
		</style>
	</head>
	<body>
		<img class="main-img" src="/kangjia/img/main_img.png"/>
		<img src="/kangjia/img/watch_ball.png" class="ball-tips" />
		<!-- level_0_pro代表特等奖，level_1_pro代表一等奖 .... -->
		<img src="/kangjia/img/ward_tips.png" class="ward-tips" />
		
		<?php  if($oneres['prize']==1) { ?>
			<img src="/kangjia/img/level_1_pro.png" class="index-btn" style="width: 80%;" />		
		<?php  } else if($oneres['prize']==2) { ?>
			<img src="/kangjia/img/level_2_pro.png" class="index-btn" style="width: 80%;" />
		<?php  } else if($oneres['prize']==3) { ?>	
			<img src="/kangjia/img/level_3_pro.png" class="index-btn" style="width: 80%;" />		
		<?php  } else if($oneres['prize']==4) { ?>
			<img src="/kangjia/img/level_0_pro.png" class="index-btn" style="width: 80%;" />		
		<?php  } ?>

		
		
		
		
		<div class="get-tips">
			<div class="wrap">
				后期我们会核实发票是否为M1、R1或OLED(特价机除外)，如果符合要求，我们将在三个工作日之内向您确认；否则，此次中奖无效，我们将把该奖项重新放出。
			</div>
		</div>
		<script src="/kangjia/js/common.js"></script>
	</body>
</html>
