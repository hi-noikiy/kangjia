<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}

class Uploadreceipt_EweiShopV2Page extends MobilePage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		//检查用户是否已经已经参与过.
		$url = mobileurl('');
		$onelottery=pdo_get('ewei_shop_lotterylist',array('openid'=>$_W['openid']));
		if($onelottery){
			header('Location: '.$url);
			exit();
		}
		unset($onelottery);
		$onelottery=pdo_get('ewei_shop_orderlist',array('openid'=>$_W['openid']));
		if($onelottery){
			header('Location: '.$url);
			exit();
		}			

		include $this->template();
	}
	
	
	public  function   upload(){
		global $_W;	global $_GPC;
			//show_json(1,$_FILES);
			if($_GPC['filenum']==1){
				$filetype=$_FILES["file1"]["type"];
				$tmpfile=$_FILES['file1']['tmp_name'];
			}
			else{
				$filetype=$_FILES["file2"]["type"];
				$tmpfile=$_FILES['file2']['tmp_name'];			
			}
			//判断图片类型
			$postfix='';
			switch ($filetype) {
				case 'image/jpeg':$postfix='.jpg';
					break;
				case 'image/jpg':$postfix='.jpg';
					break;
				case 'image/pjpeg':$postfix='.jpg';
					break;
				case 'image/x-png':$postfix='.png';
					break;
				case 'image/png':$postfix='.png';
					break;																			
				default:
					break;
			}
			if($postfix==''){
				show_json(0,'获取图片类型失败!');				
			}
			$filename='../images/'.time().$postfix;		
			if(move_uploaded_file($tmpfile,$filename)){
				$this->image_png_size_add($filename,$filename);
				setcookie("filename", $filename, time()+3600*24);
				show_json(1,$filename);
			}
			else{
				show_json(0,'文件上传失败请重试');
			}			
	}

	
	//图片压缩
	function image_png_size_add($imgsrc,$imgdst){ 
	  list($width,$height,$type)=getimagesize($imgsrc); 
	  $new_width = ($width>600?600:$width); 
	  $new_height =($height>600?600:$height); 
	  switch($type){ 
	    case 1: 
	      $giftype=check_gifcartoon($imgsrc); 
	      if($giftype){ 
	        header('Content-Type:image/gif'); 
	        $image_wp=imagecreatetruecolor($new_width, $new_height); 
	        $image = imagecreatefromgif($imgsrc); 
	        imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
	        imagejpeg($image_wp, $imgdst,75); 
	        imagedestroy($image_wp); 
	      } 
	      break; 
	    case 2: 
	      header('Content-Type:image/jpeg'); 
	      $image_wp=imagecreatetruecolor($new_width, $new_height); 
	      $image = imagecreatefromjpeg($imgsrc); 
	      imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
	      imagejpeg($image_wp, $imgdst,75); 
	      imagedestroy($image_wp); 
	      break; 
	    case 3: 
	      header('Content-Type:image/png'); 
	      $image_wp=imagecreatetruecolor($new_width, $new_height); 
	      $image = imagecreatefrompng($imgsrc); 
	      imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
	      imagejpeg($image_wp, $imgdst,75); 
	      imagedestroy($image_wp); 
	      break; 
	  } 
	} 
}
?>