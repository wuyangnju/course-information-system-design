<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>UST Foods Ordering System</title>

<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

<!-- Le styles -->

<link href="<?php echo base_url().'static/ui-timepickr/page/styles.css'?>" rel="stylesheet" type="text/css" />

<link rel="stylesheet"
	href="<?php echo base_url().'static/font-awesome/docs/assets/css/site.css'; ?>">
<link rel="stylesheet"
	href="<?php echo base_url().'static/twitter-bootstrap/bootstrap.min.css'; ?>">
<link rel="stylesheet"
	href="<?php echo base_url().'static/twitter-bootstrap/docs/assets/css/docs.css'; ?>">
<link rel="stylesheet"
	href="<?php echo base_url().'static/twitter-bootstrap/docs/assets/js/google-code-prettify/prettify.css'; ?>">
<link rel="stylesheet"
	href="<?php echo base_url().'static/font-awesome/docs/assets/css/prettify.css'; ?>">
<link rel="stylesheet"
	href="<?php echo base_url().'static/css/my.css'; ?>">
	
<script src="<?php echo base_url().'static/twitter-bootstrap/js/bootstrap-dropdown.js'; ?>"></script>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" type="image/x-icon"
	href="<?php echo base_url().'static/twitter-bootstrap/docs/assets/ico/favicon.ico'; ?>">
<link rel="apple-touch-icon"
	href="<?php echo base_url().'static/twitter-bootstrap/docs/assets/ico/bootstrap-apple-57x57.png'; ?>">
<link rel="apple-touch-icon" sizes="72x72"
	href="<?php echo base_url().'static/twitter-bootstrap/docs/assets/ico/bootstrap-apple-72x72.png'; ?>">
<link rel="apple-touch-icon" sizes="114x114"
	href="<?php echo base_url().'static/twitter-bootstrap/docs/assets/ico/bootstrap-apple-114x114.png'; ?>">
</head>

<body>

	<script src="<?php echo base_url().'static/jquery-1.7.2.min.js'; ?>"></script>
	<script
		src="<?php echo base_url().'static/jquery.tablesorter.min.js'; ?>"></script>

	<div class="topbar" data-scrollspy="scrollspy">
		<div class="topbar-inner">
			<div class="container">
				<a class="brand" href="#"></a>
				<ul class="nav">
					<li class="active"><a
						href="<?php echo base_url().'index.php/food/gethotsale'; ?>">Welcome</a>
					</li>
					<li><a
						href="<?php echo base_url().'index.php/food/getbreakfast'; ?>">Breakfast</a>
					</li>
					<li><a href="<?php echo base_url().'index.php/food/getlunch'; ?>">Lunch</a>
					</li>
					<li><a href="<?php echo base_url().'index.php/food/getsupper'; ?>">Supper</a>
					</li>
					<li><a href="<?php echo base_url().'index.php/order/show_order'; ?>">My Orders</a>
					</li>
				</ul>
				<p class="pull-right"><a id="username" href="<?php echo base_url().'index.php/customer/info'; ?>"></a></p>
			</div>
			</div>
		</div>
	</div>

	<header class="jumbotron masthead" id="overview">
		<div class="inner">
			<div class="container">
				<h1>UST Foods Ordering System</h1>
				<p class="lead">
					Are you bored when waiting in line for the seat? <br /> Do you want
					to enjoy your food just by making a call? <br /> Come and use UST
					Foods Ordering System. <br />
				</p>
			</div>
		</div>
	</header>

	<script type="text/javascript">
		$("#username").load("<?php echo base_url().'index.php/customer/username'; ?>");
		function refresh_shopping_cart_info(){
			$.ajax({
				type : "POST",
				url : "<?php echo base_url().'index.php/shopping_cart/getshopping_cart_info' ?>"
			}).done(function(msg) {
				var msgobj=eval('('+msg+')');
				var total_amount = 0;
				var total_price = 0;
				for(var i in msgobj){
					total_amount+=parseInt(msgobj[i].food_amount);
					total_price+=parseInt(msgobj[i].total_price);
				}
				$('#total_amount').html(total_amount);
				$('#total_price').html(total_price);
			});
		}
	</script>