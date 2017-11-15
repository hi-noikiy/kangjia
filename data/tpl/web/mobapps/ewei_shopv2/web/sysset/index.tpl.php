<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading"> <h2>商城设置</h2> </div>

    <form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data" >
                <div class="form-group">
                    <label class="col-sm-2 control-label">商城名称</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.shop.edit')) { ?>
                        	<input type="text" name="data[name]" class="form-control" value="<?php  echo $data['name'];?>" />
                        <?php  } else { ?>
	                        <input type="hidden" name="data[name]" value="<?php  echo $data['name'];?>"/>
	                        <div class='form-control-static'><?php  echo $data['name'];?></div>
                        <?php  } ?>

                    </div>
                </div>
                
                
                 <div class="form-group">
                    <label class="col-sm-2 control-label">一等奖人数</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.shop.edit')) { ?>
                        	<input type="number" name="data[one]" class="form-control" value="<?php  echo $data['one'];?>" />
                        <?php  } else { ?>
	                        <input type="hidden" name="data[one]" value="<?php  echo $data['one'];?>"/>
	                        <div class='form-control-static'><?php  echo $data['one'];?></div>
                        <?php  } ?>

                    </div>
                </div>               
 

                 <div class="form-group">
                    <label class="col-sm-2 control-label">一等奖概率</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.shop.edit')) { ?>
                        	<input type="number" name="data[onerate]" class="form-control" value="<?php  echo $data['onerate'];?>" />
                        <?php  } else { ?>
	                        <input type="hidden" name="data[onerate]" value="<?php  echo $data['onerate'];?>"/>
	                        <div class='form-control-static'><?php  echo $data['onerate'];?></div>
                        <?php  } ?>

                    </div>
                </div> 


                <div class="form-group">
                    <label class="col-sm-2 control-label">二等奖人数</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.shop.edit')) { ?>
                        	<input type="number" name="data[two]" class="form-control" value="<?php  echo $data['two'];?>" />
                        <?php  } else { ?>
	                        <input type="hidden" name="data[two]" value="<?php  echo $data['two'];?>"/>
	                        <div class='form-control-static'><?php  echo $data['two'];?></div>
                        <?php  } ?>

                    </div>
                </div>  


                <div class="form-group">
                    <label class="col-sm-2 control-label">二等奖概率</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.shop.edit')) { ?>
                        	<input type="number" name="data[tworate]" class="form-control" value="<?php  echo $data['tworate'];?>" />
                        <?php  } else { ?>
	                        <input type="hidden" name="data[tworate]" value="<?php  echo $data['tworate'];?>"/>
	                        <div class='form-control-static'><?php  echo $data['tworate'];?></div>
                        <?php  } ?>

                    </div>
                </div> 


                <div class="form-group">
                    <label class="col-sm-2 control-label">三等奖人数</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.shop.edit')) { ?>
                        	<input type="number" name="data[three]" class="form-control" value="<?php  echo $data['three'];?>" />
                        <?php  } else { ?>
	                        <input type="hidden" name="data[three]" value="<?php  echo $data['three'];?>"/>
	                        <div class='form-control-static'><?php  echo $data['three'];?></div>
                        <?php  } ?>

                    </div>
                </div>  


                <div class="form-group">
                    <label class="col-sm-2 control-label">三等奖概率</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.shop.edit')) { ?>
                        	<input type="number" name="data[threerate]" class="form-control" value="<?php  echo $data['threerate'];?>" />
                        <?php  } else { ?>
	                        <input type="hidden" name="data[threerate]" value="<?php  echo $data['threerate'];?>"/>
	                        <div class='form-control-static'><?php  echo $data['threerate'];?></div>
                        <?php  } ?>

                    </div>
                </div>  


                <div class="form-group">
                    <label class="col-sm-2 control-label">特等奖人数</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.shop.edit')) { ?>
                        	<input type="number" name="data[te]" class="form-control" value="<?php  echo $data['te'];?>" />
                        <?php  } else { ?>
	                        <input type="hidden" name="data[te]" value="<?php  echo $data['te'];?>"/>
	                        <div class='form-control-static'><?php  echo $data['te'];?></div>
                        <?php  } ?>

                    </div>
                </div>                 
                


                <div class="form-group">
                    <label class="col-sm-2 control-label">特等奖概率</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.shop.edit')) { ?>
                        	<input type="number" name="data[terate]" class="form-control" value="<?php  echo $data['terate'];?>" />
                        <?php  } else { ?>
	                        <input type="hidden" name="data[terate]" value="<?php  echo $data['terate'];?>"/>
	                        <div class='form-control-static'><?php  echo $data['terate'];?></div>
                        <?php  } ?>

                    </div>
                </div>   


                <div class="form-group">
                    <label class="col-sm-2 control-label">未中奖概率</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sysset.shop.edit')) { ?>
                        	<input type="number" name="data[weirate]" class="form-control" value="<?php  echo $data['weirate'];?>" />
                        <?php  } else { ?>
	                        <input type="hidden" name="data[weirate]" value="<?php  echo $data['weirate'];?>"/>
	                        <div class='form-control-static'><?php  echo $data['weirate'];?></div>
                        <?php  } ?>

                    </div>
                </div> 
                
             <div class="form-group">
                    <label class="col-sm-2 control-label">抽奖规则</label>
                    <div class="col-sm-9 col-xs-12">
						<?php  echo tpl_ueditor('data[rule]',$data['rule'])?>
                    </div>
                </div>



            <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                           <?php if(cv('sysset.shop.edit')) { ?>
                            <input type="submit" value="提交" class="btn btn-primary"  />
                          <?php  } ?>
                     </div>
            </div>
	 
 
    </form>
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>