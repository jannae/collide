<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Collide.</title>

    <!--link rel="stylesheet" type="text/css" href="/_css/reset.css"-->
    <link rel="stylesheet" type="text/css" href="../main.css">
    <script language="javascript" type="text/javascript" src="/_js/jquery-1.7.1.min.js"></script>
    
    <script type="text/javascript">
    	    
    	$(document).ready(function(){
	    	window.addEventListener("devicemotion",onDeviceMotion,false);
    	    window.addEventListener("deviceorientation",ondeviceorientation,false);
    	    window.addEventListener("touchstart", touchHandler, false);
       	});
    	
		var x, y, z; // Position Variables for 
		var vx, vy, vz; // Speed - Velocity
		var ax, ay, az; // Acceleration
		var ai; // data reporting interval (event.interval)
		var arAlpha, arBeta, arGamma; // rotation acceleration angles
		
		var delay = 100;
		var vMultiplier = 0.01;
		var alpha = 0;
		var beta = 0;
		var gamma = 0;
		var stabilize = 0;
		
		function ondeviceorientation(event) {
			alpha = event.alpha.toFixed(2);
			beta = event.beta.toFixed(2);
			gamma = event.gamma.toFixed(2);
		}
		
		function touchHandler(event) {
			stabilize = 1;
		}
		
		function onDeviceMotion(event) {
			
			ax = event.accelerationIncludingGravity.x.toFixed(2);
			ay = event.accelerationIncludingGravity.y.toFixed(2);
			az = event.accelerationIncludingGravity.z.toFixed(2);
			ai = Math.round(event.interval * 100) / 100;
			rR = event.rotationRate;
			
			if (rR != null) {
				arAlpha = rR.alpha.toFixed(2);
				arBeta = rR.beta.toFixed(2);
				arGamma = rR.gamma.toFixed(2);
			} /*					
				ax = Math.abs(event.acceleration.x * 1000);
				ay = Math.abs(event.acceleration.y * 1000);
				az = Math.abs(event.acceleration.z * 1000);		
			*/			
		}
		
		setInterval(function() {
			document.getElementById("xlabel").innerHTML = "X: " + ax;
			document.getElementById("ylabel").innerHTML = "Y: " + ay;
			document.getElementById("zlabel").innerHTML = "Z: " + az;
			document.getElementById("ilabel").innerHTML = "I: " + ai;
			document.getElementById("arAlphaLabel").innerHTML = "arA: " + arAlpha;
			document.getElementById("arBetaLabel").innerHTML = "arB: " + arBeta;
			document.getElementById("arGammaLabel").innerHTML = "arG: " + arGamma;
			document.getElementById("alphalabel").innerHTML = "Alpha: " + alpha;
			document.getElementById("betalabel").innerHTML = "Beta: " + beta;
			document.getElementById("gammalabel").innerHTML = "Gamma: " + gamma;
			
			$.get('/collide/data.php', {
				'go': 1,
				'x': ax,
				'y': ay,
				'z': az,
				'a': alpha,
				'b': beta,
				'g': gamma,
				'ar': arAlpha,
				'br': arBeta,
				'gr': arGamma,
				's' : stabilize,
			});
			if (stabilize == 1) {
				stabilize = 0;  // reset stabilization request
			}
		}, delay);		
		
	</script>
		    
    <!--[if IE]><script language="javascript" type="text/javascript" src="/_js/excanvas.js"></script><![endif]-->
        
    <script language="javascript" type="text/javascript" src="/_js/analytics.js"></script>
	</head>
	<body>
		<div id="header"><h1>Collide.</h1></div>
				
	    <div id="mobileContent">
		    <div class="box" id="accel">
	            <span class="head">Accelerometer</span> 
	            <span id="xlabel"></span> 
	            <span id="ylabel"></span> 
	            <span id="zlabel"></span> 
	            <span id="ilabel"></span> 
	            <span id="arAlphaLabel"></span> 
	            <span id="arBetaLabel"></span> 
	            <span id="arGammaLabel"></span>
	        </div>	
	        <div class="box" id="gyro">
	            <span class="head">Gyroscope</span> 
	            <span id="alphalabel"></span> 
	            <span id="betalabel"></span> 
	            <span id="gammalabel"></span>
	        </div>
	        <div class="clear"></div>
	    </div>
	</body>
</html>
