<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/kangjia/js/jQueryRotate.2.2.js"></script>
<div class="page-heading"> 
    <h2>订单管理</h2> 
</div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="shop.orderlist" />
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">
            <div class="input-group-btn">
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
                	<button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('shop/orderlist/delete')?>"><i class='fa fa-trash'></i> 删除</button>
            </div> 
        </div>	

        <div class="col-sm-6 pull-right">

            <select name="enabled" class='form-control input-sm select-sm'>
                <option value="" <?php  if($_GPC['enabled'] == '') { ?> selected<?php  } ?>>状态</option>
                <option value="1" <?php  if($_GPC['enabled']== '1') { ?> selected<?php  } ?>>正常</option>
                <option value="0" <?php  if($_GPC['enabled'] == '0') { ?> selected<?php  } ?>>异常</option>
            </select>	
            <div class="input-group">				 
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入手机号"> 
                <span class="input-group-btn">
                	<button class="btn btn-sm btn-primary" type="submit"> 搜索</button> 
                </span>
            </div>
        </div>
        
    </div>
</form>

<form action="" method="post" style="overflow:auto;">
    <?php  if(count($list)>0) { ?>
    <table class="table table-responsive table-hover" >
        <thead class="navbar-inner">
            <tr>
                <th style="width:25px;"><input type='checkbox' /></th>
                <th style='width:100px'>姓名</th>					
                <th style="width:130px;">手机号</th>
                <th style="width:130px;">地址</th> 
                <th style='width:100px'>图片</th>
                <th style='width:100px'>状态</th>                
                <th style="width:130px;">创建时间</th>                 
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
                	<span onclick="showimg('<?php  echo $row['receipt'];?>');" class='label label-success' >
                          	显示
                    </span>
                </td> 
                <td>
                	<?php  if($row['enabled']==1) { ?>
                		正常
                	<?php  } else { ?>
                		异常
                	<?php  } ?>
                	
                </td>
                <td><?php  echo date('Y-m-d H:i',$row['addtime']);?></td>
                <td style="text-align:left;">
                        	<a href="<?php  echo webUrl('shop/orderlist/edit', array('id' => $row['id']))?>" class="btn btn-default btn-sm" >
                        		<i class='fa fa-edit'></i> 修改
                        	</a>
                        	<a data-toggle='ajaxRemove' href="<?php  echo webUrl('shop/orderlist/delete', array('id' => $row['id']))?>"class="btn btn-default btn-sm" data-confirm='确认要删除吗?'><i class="fa fa-trash"></i> 删除</a>
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
                暂时没有任何订单
            </div>
        </div>
        <?php  } ?>

    </form>

	<!-- 模态框（Modal） -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">图片查看器</h4>
	            </div>
	            <div class="modal-body">
	            	<img  style="margin: 0 auto;"  id="showimgsrc" src="" class="img-responsive" alt="Cinque Terre"> 
	            </div>
	            <div class="modal-footer">
          	
	            	<button type="button" class="btn btn-primary" id="xuanzhuan">旋转</button>
	                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	            </div>
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal -->
	</div>
	<script>
		var nowtate=0;
		function   showimg(url){
			$('#showimgsrc').attr('src',url);
			$('#myModal').modal('show');
			$('#showimgsrc').rotate(0);
			nowtate=0;
		}
		$(document).ready(function () {
			
			$('#xuanzhuan').click(function(){
				nowtate+=90;
				$('#showimgsrc').rotate(nowtate);
			});
		});	
	</script>
    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
