<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="../static/node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body ng-app="routerApp">
	
	<!-- NAVIGATION -->
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<a href="navbar-brand" ui-sref="#">AngularUI Router</a>
		</div>

		<ul class="nav navbar-nav">
			<li><a ui-sref="home">Home</a></li>
			<li><a ui-sref="about">About</a></li>
		</ul>
	</nav>

	<!-- MAIN CONTENT -->
	<div class="container">

		<!-- THIS IS WHERE WE WILL INJECT OUR CONTENT -->
		<div ui-view></div>
	</div>

	<!-- Component -->
	<script type="text/javascript" src="../static/node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../static/node_modules/angular/angular.js"></script>
	<script type="text/javascript" src="../static/node_modules/angular-cookies/angular-cookies.min.js"></script>
	<script type="text/javascript" src="../static/node_modules/angular-animate/angular-animate.min.js"></script>
	<script type="text/javascript" src="../static/node_modules/angular-ui-router/build/angular-ui-router.min.js"></script>
	<script type="text/javascript" src="../static/node_modules/angular-translate/dist/angular-translate.min.js"></script>
	<script type="text/javascript" src="../static/node_modules/angular-resource/angular-resource.min.js"></script>
	<script type="text/javascript" src="../static/node_modules/angular-sanitize/angular-sanitize.min.js"></script>
	<script type="text/javascript" src="../static/node_modules/ng-storage/ngStorage.js"></script>
	<script type="text/javascript" src="../static/node_modules/angular-modal-service/dst/angular-modal-service.min.js"></script>
	<!--<script type="text/javascript" src="../static/node_modules/jquery-ui/jquery-ui.js"></script>-->

	<script type="text/javascript" src="../static/js/app_template.js"></script>
	<script type="text/javascript" src="../static/js/route.js"></script>
	<!-- <script type="text/javascript" src="../static/controllers/controllers.js"></script> -->
	

	<script type="text/javascript" src="../static/scotch/controllers/ScotchController.js"></script>

</body>
</html>