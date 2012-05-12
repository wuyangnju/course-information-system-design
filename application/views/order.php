<div class="container">
	<section id="order_history">
		<div class="page-header">
			<h1>Order History<small></small></h1>
		</div>
<table class="bordered-table zebra-striped" id="table">
        <thead>
          <tr >
            <th class="shopping_cart_column_head">Sequence</th>
            <th class="shopping_cart_column_head">Order Time</th>
            <th class="shopping_cart_column_head">Expected Time</th>
            <th class="shopping_cart_column_head">Status</th>
            <th class="shopping_cart_column_head">Confirm</th>
          </tr>
        </thead>
        <tbody>
        	<?php
        	$i = 0;
        	foreach($order_history as $item) :
				$i = $i + 1;
        	?>
          <tr>
            <td class="shopping_cart_column" width="140px"><?php echo $item->order_id; ?></td>
            <td class="shopping_cart_column"><?php echo $item->order_time; ?></td>
            <td class="shopping_cart_column"><?php echo $item->expected_time; ?></td>            
            <td class="shopping_cart_column" id="status<?php echo $i; ?>"><?php echo $item->status; ?></td>
            <td class="shopping_cart_column">
            	<?php
            		if ($username=="admin"){
            			if($item->status=="processing"){
            				echo '<button class="btn success" id="confirm'.$i.'" order_id='.$item->order_id.'">confirm</button>';
            			}else{
            				echo '<button class="btn success" disabled="disabled" id="confirm'.$i.'" order_id='.$item->order_id.'">confirm</button>';
            			}
            		}else{
            			if($item->status=="delivered"){
            				echo '<button class="btn success" id="confirm'.$i.'" order_id='.$item->order_id.'">confirm</button>';
            			}else{
            				echo '<button class="btn success" disabled="disabled" id="confirm'.$i.'" order_id='.$item->order_id.'">confirm</button>';
            			}
            		}
            		
            	?>
			</td>
          </tr>
          <script type="text/javascript">
							$('#confirm<?php echo $i; ?>').click(function() {
								$.ajax({
									type : "POST",
									url : "<?php echo base_url().'index.php/order/change_status'?>",
									data : {
										order_id : this.getAttribute("order_id")
									}
								}).done(function(msg) {
						    			$('#status<?php echo $i; ?>').html(msg);
						    			$('#confirm<?php echo $i; ?>').attr("disabled", "disabled");
								});
							});
					</script>
          <?php endforeach; ?>
        </tbody>
        </table>
	</section>
		<div id="space">
		</div>
	</div><!-- /container -->
