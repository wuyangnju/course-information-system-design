<div class="container">
	<section id="breakfast">
		<div class="page-header">
			<h1><?php echo $title; ?>&nbsp&nbsp<small>Offered <?php echo $offer_period; ?></small></h1>
		</div>
		<?php
		$i = 0;
foreach($food_list as $item) :
	$i = $i + 1;
		?>

		<div class="row row1">
			<div class="span4 column1"><img class="thumbnail" src="<?php echo base_url().$item->food_pic; ?>" alt="">
			</div>
			<div class="span4 column2">
				<section id="code">
					<div class="well column2row1">
						<span class="rating"> <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span> </span>
					</div>
				</section>
				<div class="column2row2">
					<div><span class="label success "><?php echo $item->food_name; ?></span></div>
					<div><span class="label notice"><?php echo $item->available_time; ?></span></div>
				</div>
			</div>
			<div class="span4 column3">
				<div class="column3row1">
					Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item->food_price; ?>
				</div>
				<div class="column3row2">
					Sales:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;100/Day
				</div>
				<div class="column3row3"></div>
				<div id="viewmore<?php echo $i; ?>" class = "column3row4">
					View more
				</div>
				<img id="comments<?php echo $i; ?>" src="<?php echo base_url().'upload/slider02.jpg'; ?>" alt="" width="100" height="123" />
			</div>
			<div class="span2 column4">
				<div class="buttonlayout column4row1">
					<button class="btn danger" id="buyone<?php echo $i; ?>" food_id="<?php echo $item->food_id; ?>">
						Buy One
					</button>
				</div>
			</div>
		</div>
			<script type="text/javascript">
				function screenBottom(obj){
					return window.innerHeight-(obj.position().top-window.pageYOffset)-40-64;
				}
				$('#buyone<?php echo $i; ?>').click(function() {
					$.ajax({
					type : "POST",
					url : "<?php echo base_url().'index.php/shopping_cart/add' ?>",
						data : {
						food_id : this.getAttribute("food_id")
						}
						})
						.done(function(msg) {
							$('#buyone<?php echo $i; ?>').after('<img id="arrow_down<?php echo $i; ?>" src="<?php echo base_url().'/static/images/arrow_down.png' ?>" />');
							$('#arrow_down<?php echo $i; ?>').animate({
							    opacity: 0.2,
							    "margin-top": screenBottom($('#arrow_down<?php echo $i; ?>')),
							  }, 600 );
							setTimeout(function(){
								$('#arrow_down<?php echo $i; ?>').remove();
							},600);
							refresh_shopping_cart_info();
						});
						});
							
			$('#comments<?php echo $i; ?>').hide();
			$('#viewmore<?php echo $i; ?>').click(function() {
				if($("#comments<?php echo $i; ?>").is(":hidden")) {
					$("#comments<?php echo $i; ?>").slideDown("slow");
				} else {
					$("#comments<?php echo $i; ?>").hide();
				}
			});
					</script>
		<?php endforeach;?>
	</section>
	<div id="space">
		</div>

</div><!-- /container -->
					