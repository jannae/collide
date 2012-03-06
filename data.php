<?php 

// structure of CSV for processing:
//   ax,ay,az,arA,arB,arG

$dl = ",";  // setting delimiter
$filenm = "data/data.txt";

if (isset($_GET["go"])) {
	// set = 1 for transmitting, = 0 for end/clear/stop
	
	if ($_GET["go"] == 1) {
		$x = $_GET["x"];
		$y = $_GET["y"];
		$z = $_GET["z"];
		$a = $_GET["a"];				
		$b = $_GET["b"];
		$g = $_GET["g"];
		$ar= $_GET["ar"];
		$br= $_GET["br"];
		$gr= $_GET["gr"];
		$s= $_GET["s"];
		
		$data = $x.$dl.$y.$dl.$z.$dl.$a.$dl.$b.$dl.$g.$dl.$ar.$dl.$br.$dl.$gr.$dl.$s; 
		
		$fp = fopen($filenm, "w"); 
		fwrite($fp, $data);
		fclose($fp);	
	}
	
	if ($_GET["go"] == 0) {
		//echo "<p>file cleared</p>"."\n";
		//echo "<p><a href='$filenm'>View file</a></p>";
		$fp = fopen($filenm, "w"); 
		fwrite($fp, "");
		// Close the file 
		fclose($fp);
	}
}

// I'm sure there's a reason to do this… doing it anyway.
else if ($_GET["read"] == 1) {

	$contents = file_get_contents($filenm);
	echo $contents;
}

/* notes for later, gator: 
	http://stackoverflow.com/questions/2467945/how-to-generate-json-file-with-php
	http://stackoverflow.com/questions/3126191/php-script-to-delete-files-older-than-24-hrs-deletes-all-files
	http://www.php.net/manual/en/function.unlink.php
	http://net.tutsplus.com/tutorials/php/quick-tip-loop-through-folders-with-phps-glob/
	http://ditio.net/2008/11/04/php-string-to-hex-and-hex-to-string-functions/
*/

?>


