<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading">

    <h2>系统概述</h2>
</div>


<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="contact-box">
                <div class="col-sm-1" style="padding:0">

                        <img src="<?php  if(empty($shop_data['logo'])) { ?><?php echo EWEI_SHOPV2_LOCAL;?>static/images/nopic100.jpg<?php  } else { ?><?php  echo tomedia($shop_data['logo'])?><?php  } ?>" style="width:65px;height:65px;border-radius:5px">

                </div>
            <div class="col-sm-10"  style="padding-left:10px">
                    <h3><?php  if(empty($shop_data['name'])) { ?>未设置系统名称<?php  } else { ?><?php  echo $shop_data['name'];?><?php  } ?></h3>

        </div>
        	<?php if(cv('sysset.shop.edit')) { ?>
            	<div class="col-sm-1" style="padding-left: 0"><a class="btn btn-primary btn-sm" href="<?php  echo webUrl('sysset/shop')?>" style="color: #fff"> 点击修改</a></div>
            <?php  } ?>
            <div class="clearfix"></div>

        </div>
    </div>

</div>


</div>

<input type="hidden" name="len" value="0">
<input type="hidden" name="index" value="0">
<script>
    function selectImage(obj){
        util.image('',function(val){
            $(obj).attr('src',val.url);

            $.post("<?php  echo WebUrl('shop/index/ajaxshopconfig',array('type'=>'logo'))?>", { value: val.attachment},
                    function(data){
                        if (data.status == 1)
                        {
                            tip.msgbox.suc('修改成功!' || tip.lang.success);
                        }
                        else
                        {
                            tip.msgbox.err('修改失败!' || tip.lang.error);
                        }
                    }, "json");
        });
    }
</script>

<script type="text/javascript">
    function AutoScroll(obj,len){
        var text = $(obj).find("a span");
        var index = $("input[name='index']").val();
        $("input[name='index']").val(parseInt(index)+1);
        $("input[name='len']").val(text.length);
        if (text.length > index)
        {
            $("#notice span").text($(text[index]).text());
        }
        else
        {
            $("input[name='index']").val(parseInt(0));
            $("#notice span").text($(text[0]).text());
        }

    }
    $(document).ready(function(){
        var scrollDiv = setInterval('AutoScroll("#w0-1")',3000);
        $("#w0").hover(
                function () {
                    clearInterval(scrollDiv);
                },
                function () {
                    scrollDiv = setInterval('AutoScroll("#w0-1")',3000);
                }
        );

        $.ajax({
            type: "GET",
            url: "<?php  echo webUrl('order/list/ajaxgettotals', array('merch' => -1))?>",
            dataType: "json",
            success: function (data) {
                var res = data.result;
                $("span.status1").text(res.status1);
                $("span.status4").text(res.status4);
                $.ajax({
                    type: "GET",
                    url: "<?php  echo webUrl('shop/ajax')?>",
                    dataType: "json",
                    success: function (data) {
                        var res = data.result;
                        $("span.goods_totals").text(res.goods_totals);
                        $("span.finance_total").text(res.finance_total);
                        $("span.commission_agent_total").text(res.commission_agent_total);
                        $("span.commission_agent_status0_total").text(res.commission_agent_status0_total);
                        $("span.commission_apply_status1_total").text(res.commission_apply_status1_total);
                        $("span.commission_apply_status2_total").text(res.commission_apply_status2_total);
                    }
                });
            }
        });
    });
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
