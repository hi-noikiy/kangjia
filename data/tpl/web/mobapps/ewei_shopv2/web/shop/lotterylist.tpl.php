<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> 
    <h2>中奖名单</h2> 
</div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="shop.lotterylist" />
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">
            <div class="input-group-btn">
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
                	<button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('shop/lotterylist/delete')?>"><i class='fa fa-trash'></i> 删除</button>
            </div> 
        </div>	

        <div class="col-sm-6 pull-right">

            <select name="prize" class='form-control input-sm select-sm'>
                <option value="" <?php  if($_GPC['prize'] == '') { ?> selected<?php  } ?>>奖项</option>
                <option value="1" <?php  if($_GPC['prize']== '1') { ?> selected<?php  } ?>>一等奖</option>
                <option value="2" <?php  if($_GPC['prize'] == '2') { ?> selected<?php  } ?>>二等奖</option>
                <option value="3" <?php  if($_GPC['prize'] == '3') { ?> selected<?php  } ?>>三等奖</option>  
                <option value="4" <?php  if($_GPC['prize'] == '4') { ?> selected<?php  } ?>>特等奖</option>                
            </select>	
            <div class="input-group">				 
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入手机号"> 
                <span class="input-group-btn">
                	<button class="btn btn-sm btn-primary" type="submit"> 搜索</button> 
                </span>
                <span class="input-group-btn">
                	<button onclick="window.location.href='<?php  echo webUrl('shop/lotterylist/export')?>'" class="btn btn-sm btn-primary" type="button">导出Excel</button> 
                </span>                
            </div>
        </div>
        
    </div>
    
</form>

<form action="" method="post"  style="overflow:auto;">
    <?php  if(count($list)>0) { ?>
    <table class="table table-responsive table-hover" >
        <thead class="navbar-inner">
            <tr>
                <th style="width:25px;"><input type='checkbox' /></th>
                <th style='width:100px'>用户</th>					
                <th style="width: 150px;">手机号</th>
                <th style="width: 150px;">详细地址</th>                
                <th style="width: 150px;">奖项</th> 
                <th style='width: 150px;'>奖品</th>              
                <th style='width: 150px;'>时间</th>                 
                <th style="width: 145px;">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr>
                <td>
                    <input type='checkbox'   value="<?php  echo $row['id'];?>"/>
                </td>
                <td>
					<?php  echo $row['realname'];?>
                </td>

                <td><?php  echo $row['mobile'];?></td>
                <td><?php  echo $row['address'];?></td>
                <td>
					<?php  echo $row['prize'];?>
                </td>
                <td>
					<?php  echo $row['prizename'];?>
                </td>                
                <td><?php  echo date('Y-m-d H:i',$row['addtime']);?></td>
                <td style="text-align:left;">
                    <a data-toggle='ajaxRemove' href="<?php  echo webUrl('shop/lotterylist/delete', array('id' => $row['id']))?>"class="btn btn-default btn-sm" data-confirm='确认要删除吗?'><i class="fa fa-trash"></i> 删除</a>
                </td>
            </tr>
                <?php  } } ?> 
                <tr>
                    <td colspan='6'>
                        <div class='pagers' style='float:right;'>
                            <?php  echo $pager;?>			
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php  echo $pager;?>
        <?php  } else { ?>
        <div class='panel panel-default'>
            <div class='panel-body' style='text-align: center;padding:30px;'>
                暂时没有任何中奖信息
            </div>
        </div>
        <?php  } ?>

    </form>


    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>