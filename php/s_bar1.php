  <tr>
	<td background="./images/s_bg.jpg" width="175" height="100%" valign="top">
	  <center>
		<img src="./images/spacer.gif" width="1" height="8"><br><? include("s_onair.php"); ?>
		<a href="listen.php"><img src="./images/s_listen.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br><!--
		<a href="requests.php"><img src="./images/s_requests.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
		<a href="contests.php"><img src="./images/s_contests.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
		<a href="webcam.php"><img src="./images/s_webcam.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>-->
		<a href="schedule.php"><img src="./images/s_schedule.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
		<a href="talent.php"><img src="./images/s_talent.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
		<a href="about.php"><img src="./images/s_about.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br><!--
		<a href="sponsors.php"><img src="./images/s_sponsors.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
		<a href="jobs.php"><img src="./images/s_jobs.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>-->
		<a href="./"><img src="./images/s_index.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
	  </center>
	</td>
	<td width="100%" align="left" valign="top"><img src="./images/spacer.gif" width="1" height="8"><br>
	  <table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr style="vertical-align:middle;">
		  <td align="center">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			  <tr align="center">
				<td width="9" valign="top"><img src="./images/spacer.gif" width="9" height="1"></td>
				<td><a href="http://68.168.103.13:8218/listen.pls"><img border="0" height="50" src="../images/listen/pl_winamp.png" width="50" /></a></td>
				<td><a href="http://68.168.103.13:8218/listen.pls"><img border="0" height="50" src="../images/listen/pl_iTunes.png" width="50" /></a></td>
				<td><a href="javascript:oldplayer()"><img border="0" height="50" src="../images/listen/pl_shoutcast.png" width="50" /></a></td>
				<td><a href="http://tunein.com/radio/The-Duck-s175275/" target="_blank"><img border="0" height="50" src="../images/listen/pl_tunein.png" width="50" /></a></td>
				<td><a href="http://68.168.103.13:8218/listen.pls"><img border="0" height="50" src="../images/listen/pl_quicktime.png" width="50" /></a></td>
				<td><a href="javascript:realplayer()"><img border="0" height="50" src="../images/listen/pl_real.png" width="50" /></a></td>
				<td><a href="javascript:lowdown()"><img border="0" height="50" src="../images/listen/pl_windows.png" width="50" /></a></td>
			  </tr>
			</table>
		  </td>
<!--		  <td align="center">
			<object id="fmp256" type="application/x-shockwave-flash" data="../data/minicaster.swf" width="180" height="70">
			  <param name="movie" value="../data/minicaster.swf" />
			  <param name="wmode" value="transparent" />
			  <div class="stirfry">
				<h4>Minicaster Radio Playhead</h4>
				<p class="copyright">To listen you must <a href="http://www.macromedia.com/go/getflashplayer/" title="Click here to install the Flash browser plugin from Macromedia">install Flash Player</a>.<br />Visit <a href="http://www.draftlight.net/dnex/mp3player/minicaster/" title="Draftlight Networks">Draftlight Networks</a> for more info.</p>
			  </div>
			</object>
		  </td>-->
		</tr>
	  </table>
	  <table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr>
		  <td width="135" valign="top"><img src="./images/spacer.gif" height="1" width="9"><img src="./images/t_playing.jpg"></td>
		  <td width="10" valign="top"><img src="./images/spacer.gif" width="10" height="1"></td>
		  <td valign="top"><a href="listen.php"><span class="playing" style="cursor:pointer;cursor:hand"><?
	include("./php/arlists.php");
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
	?></span></a></td>
		</tr>
	  </table>
	  <table align="left" border="0" cellpadding="6" cellspacing="6" width="100%" height="600">
		<tr valign="top">
		  <td width="525">
