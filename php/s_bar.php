  <tr>
	<td background="./images/s_bg.jpg" width="175" height="100%" valign="top">
	  <center>
		<img src="./images/spacer.gif" width="1" height="8"><br><? include("s_onair.php"); ?>
		<a href="listen.php"><img src="./images/s_listen.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
		<a href="schedule.php"><img src="./images/s_schedule.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
		<a href="talent.php"><img src="./images/s_talent.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
		<a href="about.php"><img src="./images/s_about.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
		<a href="./"><img src="./images/s_index.jpg" border="0"></a><img src="./images/spacer.gif" width="28" height="1"><br>
		<img src="./images/spacer.gif" width="1" height="27"><br>
	  </center>
	</td>
	<td width="100%" align="left" valign="top"><img src="./images/spacer.gif" width="1" height="8"><br>
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
