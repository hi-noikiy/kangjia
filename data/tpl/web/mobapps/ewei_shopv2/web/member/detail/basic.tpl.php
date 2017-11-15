<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-sm-2 control-label">粉丝</label>
    <div class="col-sm-9 col-xs-12">
        <img src='<?php  echo $member['avatar'];?>' style='width:50px;height:50px;padding:1px;border:1px solid #ccc' />
        <?php  echo $member['nickname'];?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">OPENID</label>
    <div class="col-sm-9 col-xs-12">
        <div class="form-control-static js-clip" data-url='<?php  echo $member['openid'];?>'><?php  echo $member['openid'];?></div>
</div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">会员等级</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('member.list.edit')) { ?>
        <select name='data[level]' class='form-control'>
            <option value=''><?php echo empty($shop['levelname'])?'普通会员':$shop['levelname']?></option>
            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
            <option value='<?php  echo $level['id'];?>' <?php  if($member['level']==$level['id']) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if(empty($member['level'])) { ?>
            <?php echo empty($shop['levelname'])?'普通会员':$shop['levelname']?>
            <?php  } else { ?>
            <?php  echo pdo_fetchcolumn('select levelname from '.tablename('ewei_shop_member_level').' where id=:id limit 1',array(':id'=>$member['level']))?>
            <?php  } ?>
        </div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">会员分组</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('member.list.edit')) { ?>
        <select name='data[groupid]' class='form-control'>
            <option value=''>无分组</option>
            <?php  if(is_array($groups)) { foreach($groups as $group) { ?>
            <option value='<?php  echo $group['id'];?>' <?php  if($member['groupid']==$group['id']) { ?>selected<?php  } ?>><?php  echo $group['groupname'];?></option>
            <?php  } } ?>
        </select>
        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if(empty($member['groupid'])) { ?>
            无分组
            <?php  } else { ?>
            <?php  echo pdo_fetchcolumn('select groupname from '.tablename('ewei_shop_member_group').' where id=:id limit 1',array(':id'=>$member['groupid']))?>
            <?php  } ?>
        </div>
        <?php  } ?>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-2 control-label">真实姓名</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('member.list.edit')) { ?>
        <input type="text" name="data[realname]" class="form-control" value="<?php  echo $member['realname'];?>"  />
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $member['realname'];?></div>
        <?php  } ?>
    </div>
</div>

<?php  if(!$openbind) { ?>
<div class="form-group">
    <label class="col-sm-2 control-label">手机号</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('member.list.edit')) { ?>
        <input type="text" name="data[mobile]" class="form-control" value="<?php  echo $member['mobile'];?>"  />
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $member['mobile'];?></div>
        <?php  } ?>
    </div>
</div>
<?php  } ?>


<div class="form-group">
    <label class="col-sm-2 control-label">微信号</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('member.list.edit')) { ?>
        <input type="text" name="data[weixin]" class="form-control" value="<?php  echo $member['weixin'];?>" />
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $member['weixin'];?></div>
        <?php  } ?>
    </div>
</div>





<div class="form-group">
    <label class="col-sm-2 control-label">注册时间</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static'><?php  echo date("Y-m-d H:i:s",$member['createtime'])?></div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">关注状态</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static'>
            <?php  $followed = m('user')->followed($member['openid'])?>
            <?php  if(!$followed) { ?>
            <?php  if(empty($member['uid'])) { ?>
            <label class='label label-default'>未关注</label>
            <?php  } else { ?>
            <label class='label label-warning'>取消关注</label>
            <?php  } ?>
            <?php  } else { ?>
            <label class='label label-success'>已关注</label>
            <?php  } ?>

        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">黑名单</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('member.list.edit')) { ?>
        <label class="radio-inline"><input type="radio" name="data[isblack]" value="1" <?php  if($member['isblack']==1) { ?>checked<?php  } ?>>是</label>
        <label class="radio-inline" ><input type="radio" name="data[isblack]" value="0" <?php  if($member['isblack']==0) { ?>checked<?php  } ?>>否</label>
        <span class="help-block">设置黑名单后，此会员无法访问商城</span>
        <?php  } else { ?>
        <input type='hidden' name='data[isblack]' value='<?php  echo $member['isblack'];?>' />
        <div class='form-control-static'><?php  if($member['isblack']==1) { ?>是<?php  } else { ?>否<?php  } ?></div>
        <?php  } ?>

    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">备注</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('member.list.edit')) { ?>
        <textarea name="data[content]" class='form-control'><?php  echo $member['content'];?></textarea>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $member['content'];?></div>
        <?php  } ?>
    </div>
</div>

<?php  if($diyform_flag == 1) { ?>
    <div class="form-group-title">自定义表单信息</div>
    <?php  $datas = iunserializer($member['diymemberdata'])?>
    <?php  if(is_array($fields)) { foreach($fields as $key => $value) { ?>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php  echo $value['tp_name']?></label>
        <div class="col-sm-9 col-xs-12">
            <div class="form-control-static">
                <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('diyform/diyform', TEMPLATE_INCLUDEPATH)) : (include template('diyform/diyform', TEMPLATE_INCLUDEPATH));?>
            </div>
        </div>
    </div>
    <?php  } } ?>
<?php  } ?>

<script type="text/javascript">
    $(function () {
        $(".btn-maxcredit").unbind('click').click(function () {
            var val = $(this).val();
            if(val==1){
                $(".maxcreditinput").css({'display':'inline-block'});
            }else{
                $(".maxcreditinput").css({'display':'none'});
            }
        });
    })
</script>