<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_PATH;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />

<div class="wrap">
  <div class="tabmenu">
    <?php include template('member/member_submenu');?>
  </div>
  <form method="get" action="index.php">
        <input type="hidden" name="act" value="refund" />
        <input type="hidden" name="op" value="seller" />
    <table class="search-form">
      <tr>
        <td>&nbsp;</td>
        <th style="width:115px"><select name="type">
            <option value="order_sn" <?php if($_GET['type'] == 'order_sn'){?>selected<?php }?>><?php echo $lang['refund_order_ordersn']; ?></option>
            <option value="refund_sn" <?php if($_GET['type'] == 'refund_sn'){?>selected<?php }?>><?php echo $lang['refund_order_refundsn']; ?></option>
            <option value="buyer_name" <?php if($_GET['type'] == 'buyer_name'){?>selected<?php }?>><?php echo $lang['refund_order_buyer']; ?></option>
          </select>
          <?php echo $lang['nc_colon'];?></th>
        <td class="w160"><input type="text" class="text" name="key" value="<?php echo trim($_GET['key']); ?>" /></td>
        <th><?php echo $lang['refund_buyer_add_time'].$lang['nc_colon'];?></th>
        <td class="w180"><input name="add_time_from" id="add_time_from" type="text" class="text" value="<?php echo $_GET['add_time_from']; ?>" />
          &#8211;
          <input name="add_time_to" id="add_time_to" type="text" class="text" value="<?php echo $_GET['add_time_to']; ?>" /></td>
        <td class="w90 tc"><input type="submit" class="submit" value="<?php echo $lang['nc_search'];?>" /></td>
      </tr>
    </table>
  </form>
  <table class="ncu-table-style">
    <thead>
      <tr>
        <th class="w180"><?php echo $lang['refund_order_ordersn'];?></th>
        <th class="w180"><?php echo $lang['refund_order_refundsn'];?></th>
        <th><?php echo $lang['refund_order_buyer'];?></th>
        <th class="w80"><?php echo $lang['refund_order_refund'];?></th>
        <th class="w150"><?php echo $lang['refund_buyer_add_time'].$lang[''];?></th>
        <th class="w90"><?php echo $lang['nc_status'];?></th>
        <th class="w90"><?php echo $lang['nc_handle'];?></th>
      </tr>
    </thead>
    <tbody>
      <?php if (is_array($output['refund_list']) && !empty($output['refund_list'])) { ?>
      <?php foreach ($output['refund_list'] as $key => $val) { ?>
      <tr class="bd-line" >
        <td><a href="index.php?act=store&op=show_order&order_id=<?php echo $val['order_id']; ?>" target="_blank"><?php echo $val['order_sn'];?></a></td>
        <td class="goods-num"><?php echo $val['refund_sn']; ?></td>
        <td><?php echo $val['buyer_name']; ?></td>
        <td><em class="goods-price" title="<?php echo $val['refund_paymentname']; ?>"><?php echo $val['order_refund'];?></em></td>
        <td class="goods-time"><?php echo date("Y-m-d H:i:s",$val['add_time']);?></td>
        <td><?php echo $output['state_array'][$val['refund_state']]; ?></td>
        <td>
        	<?php if ($val['refund_state'] == 1) { ?>
        	<a href="javascript:void(0)" nc_type="dialog" dialog_title="<?php echo $lang['nc_edit'];?>" dialog_id="refund_edit" dialog_width="480" uri="index.php?act=refund&op=edit&log_id=<?php echo $val['log_id']; ?>"> <?php echo $lang['nc_edit'];?> </a>
        	<?php } else { ?>
        	<a href="javascript:void(0)" nc_type="dialog" dialog_title="<?php echo $lang['nc_view'];?>" dialog_id="refund_order" dialog_width="480" uri="index.php?act=refund&op=view&log_id=<?php echo $val['log_id']; ?>"> <?php echo $lang['nc_view'];?> </a>
        	<?php } ?>
        	</td>
      </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="20"><div class="pagination"><?php echo $output['show_page']; ?></div></td>
      </tr>
    </tfoot>
    <?php } else { ?>
    <tbody>
      <tr>
        <td colspan="20" class="norecord"><i>&nbsp;</i><span><?php echo $lang['no_record'];?></span></td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8"></script> 
<script type="text/javascript">
	$(function(){
	    $('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});
	    $('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});
	});
</script> 
