<div class="container">
	<section id="shopping_cart_info">
		<div class="page-header">
			<h1>Shopping Cart <small></small></h1>
		</div>
<table class="bordered-table zebra-striped" id="table">
        <thead>
          <tr >
            <th class="shopping_cart_column_head">Food Name</th>
            <th class="shopping_cart_column_head"> Price</th>
            <th class="shopping_cart_column_head">Amount</th>
            <th class="shopping_cart_column_head">Total Price</th>
            <th class="shopping_cart_column_head">Drop</th>
          </tr>
        </thead>
        <tbody>
        	<?php
        	$i = 0;
        	foreach($shopping_item as $item) :
				$i = $i + 1;
        	?>
          <tr>
            <td class="shopping_cart_column"><?php echo $item->food_name; ?></td>
            <td class="shopping_cart_column" id="price<?php echo $i; ?>"><?php echo $item->food_price; ?></td>
            <td class="shopping_cart_column">
            	<button class="btn info amountbutton1" id="decrease<?php echo $i; ?>" food_id="<?php echo $item->food_id; ?>">
						&lt;
					</button>
            	<span><span id="amount<?php echo $i; ?>"><?php echo $item->food_amount; ?></span></span>
            	<button class="btn info amountbutton2" id="increase<?php echo $i; ?>" food_id="<?php echo $item->food_id; ?>">
						&gt;
					</button>
					</td>
            <td class="shopping_cart_column" id="total_price<?php echo $i; ?>"><?php echo $item->total_price; ?></td>
            <td class="shopping_cart_column">
					<button class="btn danger" id="drop<?php echo $i; ?>" food_id="<?php echo $item->food_id; ?>">
						Drop
					</button>
            	</td>
          </tr>
          <script type="text/javascript">
					$('#drop<?php echo $i; ?>').click(function() {
						$.ajax({
						type : "POST",
						url : "<?php echo base_url().'index.php/shopping_cart/drop' ?>",
							data : {
							food_id : this.getAttribute("food_id")
							}
							})
							.done(function(msg) {
							  $('#drop<?php echo $i; ?>').parent().parent().remove();
							  refresh_shopping_cart_info();
							});
							});
							
							    
							
							$('#increase<?php echo $i; ?>').click(function() {
								$.ajax({
									type : "POST",
									url : "<?php echo base_url().'index.php/shopping_cart/add' ?>",
									data : {
										food_id : this.getAttribute("food_id")
									}
								}).done(function(msg) {
									$.ajax({
										type : "POST",
										url : "<?php echo base_url().'index.php/shopping_cart/getshopping_cart_item' ?>",
										data : {
											food_id : msg
										}
									}).done(function(msg) {
										var msgobj=eval('('+msg+')');
						    			$('#amount<?php echo $i; ?>').html(msgobj[0].food_amount);
						    			$('#total_price<?php echo $i; ?>').html(msgobj[0].total_price);
						    			refresh_shopping_cart_info();
									});
								});
							});
							
							

							$('#decrease<?php echo $i; ?>').click(function() {
								$.ajax({
									type : "POST",
									url : "<?php echo base_url().'index.php/shopping_cart/minus' ?>",
									data : {
										food_id : this.getAttribute("food_id")
									}
								}).done(function(msg) {
									$.ajax({
										type : "POST",
										url : "<?php echo base_url().'index.php/shopping_cart/getshopping_cart_item' ?>",
										data : {
											food_id : msg
										}
									}).done(function(msg) {
										var msgobj=eval('('+msg+')');
						    			$('#amount<?php echo $i; ?>').html(msgobj[0].food_amount);
						    			$('#total_price<?php echo $i; ?>').html(msgobj[0].total_price);
						    			refresh_shopping_cart_info();
									});
								});
							});
					</script>
          <?php endforeach; ?>
        </tbody>
        </table>
        
        <link href="<?php echo base_url().'static/ui-timepickr/dist/themes/default/ui.core.css'?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'static/ui-timepickr/dist/themes/default/ui.timepickr.css'?>" rel="stylesheet" type="text/css" />
        
        <script src="<?php echo base_url().'static/ui-timepickr/page/jquery.utils.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'static/ui-timepickr/page/jquery.strings.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'static/ui-timepickr/page/jquery.anchorHandler.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'static/ui-timepickr/page/jquery.ui.all.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'static/ui-timepickr/src/ui.dropslide.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'static/ui-timepickr/src/ui.timepickr.js'?>" type="text/javascript"></script>
        
        <?php echo form_open('order/new_order', array('id' => 'shopping_cart')); ?>
        <div class="span10" align="left" style="margin-top: 15px;">
        	<h5>Expected Recieving Time:&nbsp;&nbsp;<input id="expected_time" name="expected_time" type="text"></h5>
        </div>
		<div class="actions" align="right">
		<button id="pay" type="submit" class="btn primary">Pay</button>
	</div>
<!--         <div class="actions row" style="margin-left: 0px;">
		<div class="span4" align="right"><input type="submit" class="btn success" value="Pay">&nbsp;</div>
		</div> -->
        </form>
        <script type="text/javascript">
        $(function () {
        	$('#expected_time').timepickr();
        	$('#expected_time').next().addClass('dark');

        	$('#pay').click(function(){
            	$('#shopping_cart').submit();
        	});
        });
        </script>
	</section>
	</div><!-- /container -->
