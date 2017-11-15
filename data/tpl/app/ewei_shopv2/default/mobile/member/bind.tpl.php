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
		<img src="/kangjia/img/info_tips.png" class="rule-title" />
		<section class="info-wrap" >
			<div class="item">
				<h2>姓名</h2>
				<input type="text" id="name" value="<?php  echo $member['realname'];?>" />
			</div>
			<div class="item">
				<h2>电话</h2>
				<input type="text" id="number" value="<?php  echo $member['mobile'];?>" />
			</div>
			<div class="item">
				<h2>联系地址<br /><span>（方便邮寄礼品）</span></h2>
				<input type="text" id="address" value="<?php  echo $member['address'];?>" />
			</div>
		</section>
		<img id="submit" src="/kangjia/img/djcj_btn.png" class="index-btn" />
		<script src="/kangjia/js/common.js"></script>
		<script type="text/javascript" src="/kangjia/js/jquery-1.8.3.min.js"></script>
		<script src="/kangjia/js/tools.js"></script>
		<script type="text/javascript">
			document.addEventListener('DOMContentLoaded', function () {
				var reg = /^1[34578]\d{9}$/;
				function fid (_id) {
					return document.getElementById(_id);
				}
				var name = fid('name'),
					number = fid('number'),
					address = fid('address');
				fid('submit').onclick = function () {
					if (name.value.trim() === '' || number.value.trim() === '' || address.value.trim() === '') {
						Tools.toast('请填写以上信息!');
						return ;
					}
					if(!reg.test(number.value)) {
						Tools.toast('您好，您填写的手机号码格式不正确!');
						return false;
					}
					//passed
					var url=window.location.href;

				    $.post(url,
				    {
				        realname:name.value,
				        mobile:number.value,
				        address:address.value
				    },
				        function(data,status){
				        	console.log(data);
				        	data=eval("("+data+")");
				        	if(data.status==1){
				        		var url="<?php  echo mobileurl('member/scratch');?>";
				        		window.location.href=url;
				        	}
				        	else{
				        		Tools.toast(data.result.message);
				        	}
				    });	

					
					
					
					

				}
			}, false)
		</script>
	</body>
</html>
