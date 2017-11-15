<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="/kangjia/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/kangjia/css/index.css" />
		
		<style type="text/css">
			#loadding-dom {
				position: relative;
				z-index: 100;
			}
		</style>
	</head>

	<body>
		<img class="main-img" src="/kangjia/img/main_img.png" />
		<img src="/kangjia/img/watch_ball.png" class="ball-tips" />
		<form id="sb" action="#" method="post">
			<div class="sq-img">
				<img src="" id="show" />
				<input type="file" name="file2" id="upload-show" style="display: none;" />
			</div>
			<div class="fp-btn">
				<img id="submit" src="/kangjia/img/fp_btn.png" class="index-btn" />
				<input type="file" name="file1" id="upload" />
			</div>
		</form>
		<p style="position: relative; top: -10px; font-size: 10px; color: #fff; text-align: center;">需发票与身份证同框照片,整体清晰</p>
		<script src="/kangjia/js/common.js"></script>
		<script type="text/javascript" src="/kangjia/js/jquery-1.8.3.min.js"></script>
		<script src="/kangjia/js/tools.js"></script>
		<script type="text/javascript">
			document.addEventListener('DOMContentLoaded', function() {
				var filename;

				function fid(_id) {
					return document.getElementById(_id);
				}
				var uploadBtn = fid('upload'),
					uploadShowBtn = fid('upload-show'),
					showBtn = fid('submit'),
					showImg = fid('show');

				uploadBtn.onchange = upload;
				uploadShowBtn.onchange = upload;

				function upload() {
					var file = this.files[0];
					if(!/\.(gif|png|jpeg|JPEG|jpg|GIF|PNG|JPG)$/.test(file.name)) {
						alert('请从相册选择图片或者直接拍照上传');
						return false;
					}
					filename=file.name;
					console.log(filename);
					var reader = new FileReader();
					reader.readAsDataURL(file);
					reader.onload = function(e) {
						uploadShowBtn.style.display = 'block';
						filename = file.path;
						showBtn.src = '/kangjia/img/xyb_btn.png';
						showImg.style.display = 'block';
						showImg.src = this.result;
						uploadBtn.style.display = 'none';
						showBtn.onclick = function() {
							
							Tools.showIndicator();
							var filenum=1;
							var filename1=$('#upload').val();
							var filename2=$('#upload-show').val();
							if(filename2.indexOf(filename) >= 0 ) 
							{ 
							 	filenum=2
							} 
							if(filename != '') {
								form=document.forms[0];
								formdata = new FormData(form);
								formdata.append('filenum', filenum);
								console.log(formdata);
								$.ajax({  
								     url : "<?php  echo mobileurl('shop/uploadreceipt/upload')?>",  
								     type : "POST", 
								     data : formdata,  
								   	 processData: false,
								     contentType: false,								     
								     success : function(data) {
								     	Tools.hideIndicator();
								     	console.log(data);
								     	
										var data=eval("("+data+")");
										
										if(data.status==1){
											Tools.toast('上传成功!');
											var url="<?php  echo  mobileurl('member/bind');?>";
											setTimeout(function(){window.location.href=url},1500);
										}
										else{
											Tools.toast(data.result.message);
										}
										console.log(data);								     	
								     },  
								     error : function(data) {
								     	Tools.toast('网络请求失败');
								     }
								});
							}
							else{
								Tools.toast('请选择图片!');
							}
						}
					}
				}
			}, false)
		</script>
	</body>

</html>