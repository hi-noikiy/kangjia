<?php defined('IN_IA') or exit('Access Denied');?><?php if(cv('sysset.shop|system.follow|sysset.close')) { ?>
<div class='menu-header'>系统</div>
<ul>
    <?php if(cv('sysset.shop')) { ?><li <?php  if($_W['routes']=='sysset.shop' ||$_W['routes']=='sysset') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('sysset/shop')?>">基础设置</a></li><?php  } ?>
</ul>
<?php  } ?>



<?php if(cv('sysset.cover.shop|sysset.cover.member|sysset.cover.order|sysset.cover.favorite|sysset.cover.cart|sysset.cover.coupon')) { ?>
<div class='menu-header'>入口</div>
<ul>
    <?php if(cv('sysset.cover.shop')) { ?><li <?php  if($_W['routes']=='sysset.cover.shop') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('sysset/cover/shop')?>">活动入口</a></li><?php  } ?>
</ul>
<?php  } ?>