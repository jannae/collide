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

function ondeviceorientation(event) {
	alert("ondeviceorientation");
	alpha = event.alpha.toFixed(2);
	beta = event.beta.toFixed(2);
	gamma = event.gamma.toFixed(2);
}

function onDeviceMotion(event) {
	alert("onDeviceMotion");
	$("#printData").hide();
	$("#header").hide();
	$("#sources").hide();
	
	ax = event.accelerationIncludingGravity.x.toFixed(2);
	ay = event.accelerationIncludingGravity.y.toFixed(2);
	az = event.accelerationIncludingGravity.z.toFixed(2);
	ai = Math.round(event.interval * 100) / 100;
	rR = event.rotationRate;
	
	if (rR != null) {
		arAlpha = rR.alpha;
		arBeta = rR.beta).toFixed(2);
		arGamma = rR.gamma.to;
	} /*					
		ax = Math.abs(event.acceleration.x * 1000);
		ay = Math.abs(event.acceleration.y * 1000);
		az = Math.abs(event.acceleration.z * 1000);		
	*/
	setInterval(function() {
		$.get('data.php', {
			'go': 1,
			'x': ax,
			'y': ay,
			'z': az,
			'a': alpha,
			'b': beta,
			'g': gamma,
			'ar': arAlpha.toFixed(2),
			'br': arBeta.toFixed(2),
			'gr': arGamma.toFixed(2),
		});
	}, delay);
}


window.addEventListener("compassneedscalibration", function(event) {
	alert('Your compass needs calibrating! Wave your device in a figure-eight motion');
	event.preventDefault();
}, true);

/*
function onDeviceMotion(event) {

	ax = event.accelerationIncludingGravity.x.toFixed(2);
	ay = event.accelerationIncludingGravity.y.toFixed(2);
	az = event.accelerationIncludingGravity.z.toFixed(2);
	ai = Math.round(event.interval * 100) / 100;
	rR = event.rotationRate;
	
	if (rR != null) {
		arAlpha = (rR.alpha).toFixed(2);
		arBeta = (rR.beta).toFixed(2);
		arGamma = (rR.gamma).toFixed(2);
	} /*					
		ax = Math.abs(event.acceleration.x * 1000);
		ay = Math.abs(event.acceleration.y * 1000);
		az = Math.abs(event.acceleration.z * 1000);		
	
	setInterval(function() {
		$.get('data.php', {
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
		});
		/*document.getElementById("xlabel").innerHTML = "X: " + ax;
		document.getElementById("ylabel").innerHTML = "Y: " + ay;
		document.getElementById("zlabel").innerHTML = "Z: " + az;
		document.getElementById("ilabel").innerHTML = "I: " + ai;
		document.getElementById("arAlphaLabel").innerHTML = "arA: " + arAlpha;
		document.getElementById("arBetaLabel").innerHTML = "arB: " + arBeta;
		document.getElementById("arGammaLabel").innerHTML = "arG: " + arGamma;
		document.getElementById("alphalabel").innerHTML = "Alpha: " + alpha;
		document.getElementById("betalabel").innerHTML = "Beta: " + beta;
		document.getElementById("gammalabel").innerHTML = "Gamma: " + gamma;
	}, delay);
}
 /* Old stuff I don't think I need:
	
   
    // function converting decimal values to hex values
	function d2h(d) {
		return d.toString(16);
	}
	
	// function for converting hex values to decimal 
	function h2d(h) {
		return parseInt(h, 16);
	}
	
	// converts decimal numbers to HTML/Hex code color
	function makecolor(a, b, c) {
		red = Math.abs(a) % 255;
		green = Math.abs(b) % 255;
		blue = Math.abs(c) % 255;
		return "#" + d2h(red) + d2h(green) + d2h(blue);
	}
	
	function makeacceleratedcolor(a, b, c) {
		red = Math.round(Math.abs(a + az) % 255);
		green = Math.round(Math.abs(b + ay) % 255);
		blue = Math.round(Math.abs(c + az) % 255);
		
		return "#" + d2h(red) + d2h(green) + d2h(blue);
	}
*/
