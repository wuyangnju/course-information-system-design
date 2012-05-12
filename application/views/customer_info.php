<div class="container">

<form id="customer_info" method="post" action="<?php echo base_url().'index.php/customer/update'; ?>">
<fieldset>
	<div class="clearfix">
		<label for="xlInput">Name</label>
		<div class="input">
			<input class="xlarge" id="Lastname" name="name" size="30" type="text"
				value="<?php echo $customer[0]->name;?>" />
		</div>
	</div>
	<!-- /clearfix -->

	<div class="clearfix">
		<label for="xlInput">Phone Number</label>
		<div class="input">
			<input id="cellphone_no" name="cellphone_no" size="30" type="text"
				value="<?php echo $customer[0]->cellphone_no;?>" />
		</div>
	</div>
	<!-- /clearfix -->

	<div class="clearfix">
		<label for="mediumSelect">Address One</label>
		<div class="input">
			<?php
				$addr=explode("_", $customer[0]->address1);
				if(count($addr)==2){
					$building=$addr[0];
					$room_number=$addr[1];
				}else{
					$building="";
					$room_number="";
				}
			?>
			<select class="medium" name="address1_1" id="Address1_1">
				<option value="Academic Building" <?php if ($building=="Academic Building") {echo "selected";}?>>Academic Building</option>
				<option value="Tower A" <?php if ($building=="Tower A") {echo "selected";}?>>Tower A</option>
				<option value="Tower B" <?php if ($building=="Tower B") {echo "selected";}?>>Tower B</option>
				<option value="UG Hall Ⅰ" <?php if ($building=="UG Hall Ⅰ") {echo "selected";}?>>UG Hall Ⅰ</option>
				<option value="UG Hall Ⅱ" <?php if ($building=="UG Hall Ⅱ") {echo "selected";}?>>UG Hall Ⅱ</option>
				<option value="UG Hall Ⅲ" <?php if ($building=="UG Hall Ⅲ") {echo "selected";}?>>UG Hall Ⅲ</option>
				<option value="UG Hall Ⅳ" <?php if ($building=="UG Hall Ⅳ") {echo "selected";}?>>UG Hall Ⅳ</option>
				<option value="UG Hall Ⅴ" <?php if ($building=="UG Hall Ⅴ") {echo "selected";}?>>UG Hall Ⅴ</option>
			</select>
			<span>Room Number</span>
			<input id="Address1_2" name="address1_2" size="30" type="text" value="<?php echo $room_number; ?>" />
		</div>
	</div>
	<!-- /clearfix -->

	<div class="clearfix">
		<label for="mediumSelect">Address One</label>
		<div class="input">
			<?php
				$addr=explode("_", $customer[0]->address2);
				if(count($addr)==2){
					$building=$addr[0];
					$room_number=$addr[1];
				}else{
					$building="";
					$room_number="";
				}
			?>
			<select class="medium" name="address2_1" id="Address2_1">
				<option value="Academic Building" <?php if ($building=="Academic Building") {echo "selected";}?>>Academic Building</option>
				<option value="Tower A" <?php if ($building=="Tower A") {echo "selected";}?>>Tower A</option>
				<option value="Tower B" <?php if ($building=="Tower B") {echo "selected";}?>>Tower B</option>
				<option value="UG Hall Ⅰ" <?php if ($building=="UG Hall Ⅰ") {echo "selected";}?>>UG Hall Ⅰ</option>
				<option value="UG Hall Ⅱ" <?php if ($building=="UG Hall Ⅱ") {echo "selected";}?>>UG Hall Ⅱ</option>
				<option value="UG Hall Ⅲ" <?php if ($building=="UG Hall Ⅲ") {echo "selected";}?>>UG Hall Ⅲ</option>
				<option value="UG Hall Ⅳ" <?php if ($building=="UG Hall Ⅳ") {echo "selected";}?>>UG Hall Ⅳ</option>
				<option value="UG Hall Ⅴ" <?php if ($building=="UG Hall Ⅴ") {echo "selected";}?>>UG Hall Ⅴ</option>
			</select> <span>Room Number</span> <input id="Address2_2"
				name="address2_2" size="30" type="text"
				value="<?php echo $room_number; ?>" />
		</div>
	</div>
	<!-- /clearfix -->

	<div class="clearfix">
		<label for="mediumSelect">Address One</label>
		<div class="input">
			<?php
				$addr=explode("_", $customer[0]->address3);
				if(count($addr)==2){
					$building=$addr[0];
					$room_number=$addr[1];
				}else{
					$building="";
					$room_number="";
				}
			?>
			<select class="medium" name="address3_1" id="Address3_1">
				<option value="Academic Building" <?php if ($building=="Academic Building") {echo "selected";}?>>Academic Building</option>
				<option value="Tower A" <?php if ($building=="Tower A") {echo "selected";}?>>Tower A</option>
				<option value="Tower B" <?php if ($building=="Tower B") {echo "selected";}?>>Tower B</option>
				<option value="UG Hall Ⅰ" <?php if ($building=="UG Hall Ⅰ") {echo "selected";}?>>UG Hall Ⅰ</option>
				<option value="UG Hall Ⅱ" <?php if ($building=="UG Hall Ⅱ") {echo "selected";}?>>UG Hall Ⅱ</option>
				<option value="UG Hall Ⅲ" <?php if ($building=="UG Hall Ⅲ") {echo "selected";}?>>UG Hall Ⅲ</option>
				<option value="UG Hall Ⅳ" <?php if ($building=="UG Hall Ⅳ") {echo "selected";}?>>UG Hall Ⅳ</option>
				<option value="UG Hall Ⅴ" <?php if ($building=="UG Hall Ⅴ") {echo "selected";}?>>UG Hall Ⅴ</option>
			</select> <span>Room Number</span> <input id="Address3_2"
				name="address3_2" size="30" type="text"
				value="<?php echo $room_number; ?>" />
		</div>
	</div>
	<!-- /clearfix -->

	<div class="actions">
		<button id="save_change" type="submit" class="btn primary">Save changes</button>
		<button type="reset" class="btn"> Cancel </button>
	</div>
</fieldset>
</form>
</div>

<script type="text/javascript">
	$('#save_change').click(function(){
		$('#customer_info').submit();
	});

</script>