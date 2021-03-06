<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="/kangjia/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/kangjia/css/index.css" />
		<style type="text/css">
			#container {
				position: relative;
				width: 80%;
				height: 105px;
				margin: 30px auto;
				box-sizing: border-box;
				padding: 15px;
				background-color: #fffcdb;
			}
			
			#redux {
				position: absolute;
				top: 0;
				bottom: 0;
				right: 0;
				left: 0;
				width: 100%;
				height: 100%;
				z-index: 999;
			}
		</style>
	</head>

	<body>
		<img class="main-img" src="/kangjia/img/main_img.png" />
		<img src="/kangjia/img/watch_ball.png" class="ball-tips" />
		<img src="/kangjia/img/jx_tips.png" class="index-btn" />
		<div id="container">
			<div class="mask-img">
				<img id="level-img" src="<?php  if($state==1) { ?>/kangjia/img/level_1.png<?php  } else if($state==2) { ?>/kangjia/img/level_2.png<?php  } else if($state==3) { ?>/kangjia/img/level_3.png<?php  } else if($state==4) { ?>/kangjia/img/level_0.png<?php  } else if($state==5) { ?>/kangjia/img/noting_img.png<?php  } ?>">
			</div>
			<img id="redux" src="/kangjia/img/guajiang_bg.png" />
		</div>
		<a href="<?php  echo mobileurl('member/receive');?>"><img id="get" style="display: none;" src="/kangjia/img/lq_btn.png" class="index-btn" /></a>
		<script src="/kangjia/js/common.js"></script>
		<script src="/kangjia/js/jquery-1.8.3.min.js"></script>
		<script src="/kangjia/js/jquery.eraser.js"></script>
		<script type="text/javascript">
			$(function() {

				var state ="<?php  echo $state;?>";
				
				var img = document.getElementById('level-img');
                var img1 = document.getElementById('redux');

                var tmpImg1 = new Image();
                tmpImg1.onload = function () {
                    var tmpImg = new Image();
                    tmpImg.src = img.src;
                    tmpImg.onload = r;
                }
				
                tmpImg1.src = img1.src;
				function r () {
					console.log('---------------------------------------------haha');
					$('#redux').eraser({
						size: 20,
						completeRatio: .5,
						completeFunction: function() {
						    var get = $('#get');
                            if(state == 5) {
                                //没中奖
                                get.hide();
                            } else {
                                get.show();
                            }
						}
					});
				}
			})
		</script>
	</body>

</html>