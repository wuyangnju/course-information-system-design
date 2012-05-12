<div class="container">

<footer class="footer">
	<span class="pull-left">Please choose your favourate food.</span>
	<span class="pull-right">Summary:&nbsp&nbsp<span id="total_amount"></span> items &nbsp&nbsp|&nbsp&nbsp<span id="total_price"></span> HK$ &nbsp&nbsp| &nbsp&nbsp<a href="<?php echo base_url().'index.php/shopping_cart/getshopping_cart'; ?>">Go to shopping cart:</a></span>
</footer>

<script type="text/javascript">

$(function(){
	refresh_shopping_cart_info();
});
</script>

</div> <!-- /container -->

<script src="<?php echo base_url().'static/twitter-bootstrap/docs/assets/js/google-code-prettify/prettify.js'; ?>"></script>
<script>
	$(function() {
		prettyPrint()
	})
</script>
<script src="<?php echo base_url().'static/twitter-bootstrap/docs/assets/js/application.js'; ?>"></script>

<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/underscore.min.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/backbone.min.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/prettify.min.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-transition.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-alert.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-modal.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-dropdown.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-scrollspy.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-tab.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-tooltip.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-popover.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-button.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-collapse.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-carousel.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/tw-bs-201/bootstrap-typeahead.js'; ?>"></script>
<script src="<?php echo base_url().'static/font-awesome/docs/assets/js/index/index.js'; ?>"></script>

<script type="text/javascript">

	$(function() {
		$('#iconCarousel').carousel({
			interval : 5000
		});

		// tooltips
		$('#why').tooltip({
			selector : "a[rel=tooltip]",
			placement : 'bottom'
		})

		// make code pretty
		window.prettyPrint && prettyPrint();
	});

</script>

</body>
</html>
