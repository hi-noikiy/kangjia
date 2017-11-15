<?php
	//文件上传
	if(move_uploaded_file($_FILES['file']['tmp_name'], $_FILES["file"]["name"])){
		
		//记录日志
		$str='文件名:'.$_FILES['file']['tmp_name'].'--文件介绍:'.$_POST['desc'].'--Formdata追加的字段值:'.$_POST['diycontent'];
		
		file_put_contents('log/'.time().'.txt',$str);
		
		//让前端控制台输出看
		echo $str;
	}
?>