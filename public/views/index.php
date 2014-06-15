<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Host Broadcast Jobs System</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"> <!-- load fontawesome -->

	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet"> <!-- load bootstrap styles -->

	<link rel="stylesheet" href="css/styles.css">
	
	<!-- JS -->
	<script src="components/jquery/dist/jquery.js"></script>
	<script src="components/angular/angular.js"></script>
	<script src="components/angular-route/angular-route.js"></script>
	<script src="components/angular-bootstrap/ui-bootstrap.js"></script>
	<script src="components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
	<script src="js/app.js"></script>
	<!-- controllers -->
	<script src="js/controllers/navCtrl.js"></script>
	<script src="js/controllers/jobCtrl.js"></script>
	<!-- services -->
	<script src="js/services/jobService.js"></script>

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="broadcastApp">
<div class="col-md-10 col-md-offset-1">

	<div ng-include src="'views/headerTpl.html'"></div>

	<div class="main" ng-view="" autoscroll=""></div>

</div>
</body>
</html>