<? 
function mobileDevice() {
	$type = $_SERVER['HTTP_USER_AGENT'];
	
	if(strpos((string)$type, 'Windows Phone') != false || strpos((string)$type, 'iPhone') != false || strpos((string)$type, 'Android') != false)
		return true;
	else
		return false;
}

if(mobileDevice() == true)
	header('Location: /collide/m');
?>
<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Collide.</title>

    <link rel="stylesheet" type="text/css" href="/_css/reset.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script language="javascript" type="text/javascript" src="/_js/jquery-1.7.1.min.js"></script>
    <script language="javascript" type="text/javascript" src="/_js/processing-1.3.6.min.js"></script>
    
    <script language="javascript" type="text/javascript">
    	$.get('data.php', { 'go': 0	});
    </script>
    		    
    <!--[if IE]><script language="javascript" type="text/javascript" src="/_js/excanvas.js"></script><![endif]-->
        
    <script language="javascript" type="text/javascript" src="/_js/analytics.js"></script>
	</head>
	<body>
		<div id="header"><h1>http://jann.ae/collide</h1></div>
		<div id="mainContent">
			<div id="printData"></div>
		    <script id="sketch" type="application/processing" src="run.js"></script>
			<canvas id="run">
				<p>Your browser does not support the canvas tag.</p>
			</canvas>
			<noscript>
				<p>JavaScript is required to view the contents of this page.</p>
			</noscript>
			<div id="sources">Source code: <a href="run.js">ProcessingJS file</a> <a href="#">placeholder 2</a> | 
			Built with <a href="http://processing.org" title="Processing">Processing</a> and <a href="http://processingjs.org" title="Processing.js">Processing.js</a></div>
	    </div>
	</body>
</html>