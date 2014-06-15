<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Host Broadcast Jobs System</title>

	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->

	<link rel="stylesheet" href="css/styles.css">

	<!-- JS -->
	<script src="components/jquery/dist/jquery.js"></script>
	<script src="components/angular/angular.js"></script>
	<script src="components/angular-route/angular-route.js"></script>
	<script src="components/angular-bootstrap/ui-bootstrap.js"></script>
	<script src="components/angular-bootstrap/ui-bootstrap-tpls.js"></script>

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
	<script src="js/app.js"></script>
	<script src="js/controllers/navCtrl.js"></script>
	<script src="js/services/jobService.js"></script>
	<script src="js/services/clientService.js"></script>
	<script src="js/services/creativePartnerService.js"></script>
	<script src="js/services/agencyProducerService.js"></script>
	<script src="js/services/agencyDirectorService.js"></script>
	<script src="js/controllers/jobCtrl.js"></script>

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="broadcastApp">
<div class="col-md-10 col-md-offset-1">

	<div ng-include src="'views/headerTpl.html'"></div>

	<div class="main" ng-view=""></div>

</div>
</body>
</html>