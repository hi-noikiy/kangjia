<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> 
	<span class='pull-right'>

		<a class="btn btn-default  btn-sm" href="<?php  echo webUrl('shop/orderlist')?>">返回列表</a>
	</span>
	<h2>审核订单</small></h2> 
</div>
 
    <form <?php if( ce('shop.adv' ,$item) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        		<input type="hidden"   name="openid"   value="<?php  echo $item['openid'];?>"/>
                <div class="form-group">
                    <label class="col-sm-2 control-label">用户姓名</label>
                    <div class="col-sm-9 col-xs-12">
                                <input type="text"  class="form-control" value="<?php  echo $item['realname'];?>"  readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label ">用户手机</label>
                    <div class="col-sm-9 col-xs-12 ">
                        	<input type="text"  class="form-control" value="<?php  echo $item['mobile'];?>"   readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label ">详细地址</label>
                    <div class="col-sm-9 col-xs-12 ">
                        	<input type="text"  class="form-control" value="<?php  echo $item['address'];?>"   readonly="readonly" />
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-sm-2 control-label ">提交时间</label>
                    <div class="col-sm-9 col-xs-12 ">
                        	<input type="text"  class="form-control" value="<?php  echo date('Y-m-d H:i:s',$item['addtime']);?>"   readonly="readonly" />
                    </div>
                </div>
                
                

                <div class="form-group">
                    <label class="col-sm-2 control-label">订单状态</label>
                    <div class="col-sm-9 col-xs-12">
                    	<?php if( ce('shop.adv' ,$item) ) { ?>
                    		<label class='radio-inline'>
                            	<input type='radio' name='enabled' value=1' <?php  if($item['enabled']==1) { ?>checked<?php  } ?> /> 正常
                            </label>
                        	<label class='radio-inline'>
                        		<input type='radio' name='enabled' value=0' <?php  if($item['enabled']==0) { ?>checked<?php  } ?> /> 异常(设为异常,如果当前用户在中奖列表中中奖设为未中奖,留给其他人中奖机会)
                        	</label>
                        <?php  } else { ?>
                            <div class='form-control-static'><?php  if(empty($item['enabled'])) { ?>异常<?php  } else { ?>正常<?php  } ?></div>
                        <?php  } ?>
                    </div>
                </div>
            
            <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                    	<?php if( ce('shop.adv' ,$item) ) { ?>
                    		<input type="submit" value="提交" class="btn btn-primary"  />
                    	<?php  } ?>
                       <input type="button" name="back" onclick='history.back()' <?php if(cv('shop.adv.add|shop.adv.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
                    </div>
            </div>
 
    </form>
 

<script language='javascript'>
    function formcheck() {
        if ($("#advname").isEmpty()) {
            Tip.focus("advname", "请填写幻灯片名称!");
            return false;
        }
        return true;
    }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>