<?php defined('IN_IA') or exit('Access Denied');?>
<ul class="menu-head-top">
    <li <?php  if($_W['controller']=='shop') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('shop')?>">系统概述 <i class="fa fa-caret-right"></i></a></li>
</ul>


<?php if(cv('shop.adv|shop.nav|shop.banner|shop.sort')) { ?>
<div class='menu-header'>首页</div>
<ul>
    <?php if(cv('shop.orderlist')) { ?><li <?php  if($_W['action'] == 'shop.orderlist') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('shop/orderlist')?>">订单列表</a></li><?php  } ?>  
    <?php if(cv('shop.lotterylist')) { ?><li <?php  if($_W['action'] == 'shop.lotterylist') { ?> class="active" <?php  } ?>><a href="<?php  echo webUrl('shop/lotterylist')?>">中奖列表</a></li><?php  } ?>     
</ul>
<?php  } ?>

