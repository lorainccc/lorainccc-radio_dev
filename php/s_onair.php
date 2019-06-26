<?

/* Show who is Currently On-Air                              */
/* Chris "Kewl" Haslage, Program Director, Duck Radio        */
/* 3/5/04 @ 10:00p - 12:20a                                  */

$schedule = "data/schedule.txt";

/* Main Time Configuration For All Streams on Same Server */
/* Spring Time =   4 		 */
/* Fall Time =     5 		 */
/* Last Variable = Time Offset */
$timeAdjust = (2 * 60 * 60) + (0 * 60);

$nowSys = date("H",time()) *60 + date("i",time());
$curMin = date("H",time() - $timeAdjust) *60 + date("i",time() - $timeAdjust);
$todayDay = date("w",time() - $timeAdjust);
if ($todayDay == 0) { $todayDay = 7; }

$jockOn = 0;
$fp=fopen($schedule,"r");
while (!feof($fp)) {
   $buffer = fgets($fp, 4096);

	$pieces = explode("|", $buffer);
	$dayToday = $pieces[0];
	$timeStart = $pieces[1];
	$timeEnd = $pieces[2];
	$imgName = $pieces[3];
	$jockUrl = $pieces[4];
	$jockNfo = $pieces[5];
	$jockNme = $pieces[6];

	$timeStart = explode(":", $timeStart);
	$timeEnd = explode(":", $timeEnd);

	$ampmStart = $timeStart[0];
	$ampmEnd = $timeEnd[0];
	
	if ($ampmStart > 12) { $ampmStart -= 12; $ampm = 'pm'; } 
	else { $ampm = 'am'; }
	if ($ampmStart == 12) { $ampm = 'pm'; }
	if ($ampmStart == 0) { $ampmStart = 12; $ampm = 'am'; }

	if ($timeStart[1] != "00") { $ampmStart = "$ampmStart:$timeStart[1]$ampm"; }
	else { $ampmStart = "$ampmStart$ampm"; }

	if ($timeEnd[1] == "59") { $ampmEnd++; $ampmMinutes = "00"; }
	else if ($timeEnd[1] == "29") { $ampmMinutes = "30"; }

	if ($ampmEnd > 12) { $ampmEnd -= 12; $ampm = 'pm'; } 
	else { $ampm = 'am'; }
	if ($ampmEnd == 12 && $timeEnd[0] == 11) { $ampm = 'pm'; }
	if ($ampmEnd == 12 && $timeEnd[0] == 23) { $ampmEnd = 12; $ampm = 'am'; }

	if ($ampmMinutes != "00") { $ampmEnd = "$ampmEnd:$ampmMinutes$ampm"; }
	else { $ampmEnd = "$ampmEnd$ampm"; }

	$tStart = $timeStart[0] * 60 + $timeStart[1];
	$tEnd = $timeEnd[0] * 60 + $timeEnd[1];

	if ($todayDay == $dayToday) { 
		if ($curMin >= $tStart && $tEnd >= $curMin && $jockOn == 0)
		{
			print "<IMG src=\"./images/s_onair.jpg\"><br>\n";
			print "<a href=\"./content.php?pageInfo=talent/$jockUrl&amp;pageName=$jockNme\"><img src=\"./images/jt_$imgName\" border=\"0\"></a><br>\n";
			print "<a href=\"./content.php?pageInfo=talent/$jockUrl&amp;pageName=$jockNme\"><span class=\"onair\" style=\"cursor:pointer;cursor:hand\">$jockNfo<br>($ampmStart - $ampmEnd)</span></a>\n";
			$jockOn = 1;
		}
	}
}

fclose($fp);

if ($jockOn == 0) {
$curTime = date("g:ia",time() - $timeAdjust);
	print "<IMG src=\"./images/s_onair.jpg\"><br>\n";
	print "<img src=\"./images/jt_nopic.jpg\"><br>\n";
	print "<span class=\"onair\">Station Automation<br>($curTime)</span>\n";
}

?>