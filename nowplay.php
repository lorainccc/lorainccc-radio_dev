<h3>Now Playing:</h3> <span id="trackinfo" class="playing">
<?php

	$host = "68.168.103.13"; // ip or url of shoutcast server
	$port = "8218";          // port of shoutcast server
	$fp = @fsockopen($host, $port, $errno, $errstr, 30);
	if($fp) {
	  fputs($fp,"GET /7.html HTTP/1.0\r\nUser-Agent: GET SEVEN (Mozilla Compatible)\r\n\r\n");
	  while(!feof($fp)) {
		$data= fgets($fp, 1000);
	  }
	  fclose($fp);
	  $data              = preg_replace("<body>", "", $data);
	  $data              = preg_replace("</body>", ",", $data);
	  $data              = substr($data, 0, strlen($data) - 1);
	  $data_array        = explode(",",$data);
	  $listeners         = $data_array[0];
	  $status            = $data_array[1];
	  $peak_listeners    = $data_array[2];
	  $maximum_listeners = $data_array[3];
	  $unique_listeners  = $data_array[4];
	  $bitrate           = $data_array[5];
	  $offset = 6; //6th in the Array
	  $search = ',';
	  $track = substr($data, strposOffset($search, $data, $offset) + 1);
	}
	
	if ($status == 1) { print $track; }
	else { print 'The Duck is currently offline but will resume broadcasting shortly. Thank you for your patience.'; }
	function strposOffset($search, $string, $offset) {
	  /*** explode the string ***/
	  $arr = explode($search, $string);
	  /*** check the search is not out of bounds ***/
	  switch( $offset ) {
		case $offset == 0:
		return false;
		break;
		case $offset > max(array_keys($arr)):
		return false;
		break;
		default:
		return strlen(implode($search, array_slice($arr, 0, $offset)));
	  }
	}

//	$title  = chop('$track');
//	$select = explode(" - ",$title);
//	$artist = chop('$select[0]');
//	$title  = chop('$select[1]');
?>
</span>
