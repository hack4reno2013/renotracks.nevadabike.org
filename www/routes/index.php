<?php
if ( isset( $_GET['id'] ) )
	$config = array( 'tripId' => intval( $_GET['id'] ), 'tripNum' => 1 );
else
	$config = array( 'tripNum' => 10 );
$config_json = json_encode( $config );
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Visualizing RenoTracks Data</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css"/>
	<link rel="stylesheet" href="css/leaflet.awesome-markers.css">
	<link rel="stylesheet" href="css/lightbox.css"/>
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push( ['_setAccount', ''] );
		_gaq.push( ['_trackPageview'] );

		(function () {
			var ga = document.createElement( 'script' );
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName( 'script' )[0];
			s.parentNode.insertBefore( ga, s );
		})();
	</script>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
	your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
	improve your experience.</p>
<![endif]-->

<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">RenoTracks</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav">
				<li><a href="/">Home</a></li>
				<li class="active"><a href=".">Map</a></li>
				<li><a href="tally.php">Tallies</a></li>
			</ul>
	    </div>
	</div>
</nav>
<div class="sidebar-container">
	<div class="sidebar map-options" data-spy="affix">
	<a class="section option-header" data-toggle="collapse" data-target="#sidebar_content" href="#sidebar_content">
		<span class="glyphicon glyphicon-cog"></span>
		<span class="title">Map Options</span>
	</a>
	<div id="sidebar_content" class="collapse in">
		<div class="section map-controls">
			<div class="col-xs-6"><button type="button" data-toggle="button" class="btn btn-default trips">Trips</button></div>
			<div class="col-xs-6"><button type="button" data-toggle="button" class="btn btn-default streets">Streets</button></div>
			<div class="col-xs-6"><button type="button" data-toggle="button" class="btn btn-default notes">Notes</button></div>
			<div class="col-xs-6"><button type="button" data-toggle="button" class="btn btn-default parks">Parks</button></div>
			<br/>
			<button type="button" class="btn rtc">Bike Lanes and More</button>
		</div>
		<div class="col-xs-12 info">
			<p>Visualizing <span class="trip_count">m</span> trips and
				<span class="coordinate_count">n</span> collected data points.
			</p>
		</div>
	</div>
</div>
</div>

<div class="row-fluid map-container">
	<div class="span12">
		<div id="mapBody"></div>
	</div>

</div>
<!-- /container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>window.jQuery || document.write( '<script src="js/vendor/jquery-1.8.3.min.js"><\/script>' )</script>
<script src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js"></script>

<script src="js/vendor/lightbox.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/leaflet.awesome-markers.js"></script>

<script src="js/main.js?v=20140228"></script>

<script type="text/javascript">
	(function () {
		Trips.init( <?php echo $config_json; ?> );
		
		$('#sidebar_content').on('hide.bs.collapse', function () {
			$('.sidebar .title').slideToggle();
		})
		
		$('#sidebar_content').on('show.bs.collapse', function () {
			$('.sidebar .title').slideToggle(function() {
				$(this).css('display','inline');
			});
		})
		
		$(".btn").mouseup(function(){
			$(this).blur();
		})
	})();
	
	
</script>
</body>
</html>
