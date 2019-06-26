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
	  $data              = ereg_replace(".*<body>", "", $data);
	  $data              = ereg_replace("</body>.*", ",", $data);
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
	
//	$title  = chop('$track');
//	$select = explode(" - ",$title);
//	$artist = chop('$select[0]');
//	$title  = chop('$select[1]');
?>
</span>