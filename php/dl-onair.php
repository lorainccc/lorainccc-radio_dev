<?

/* Show who is Currently On-Air (Modified for Low-Down)      */
/* Chris "Kewl" Haslage, Program Director, Duck Radio        */
/* 3/5/04 @ 10:00p - 12:20a                                  */

$schedule = "data/schedule.txt";
$timeAdjust = (4 * 60 * 60); 
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
			print "<a href=\"content.php?pageInfo=talent/$jockUrl&pageName=Duck%20Radio%20Talent\" target=\"duck_radio_talent\"><APPLET code=\"JavaCam.class\" codebase=\"http://www.lcccstudentlife.com/radio/java/webcam/\" width=\"160\" height=\"120\"><PARAM name=\"interval\" value=\"10\"><PARAM name=\"url\" value=\"http://www.lcccstudentlife.com/radio/images/thb_webcam.jpg\"><PARAM name=\"link\" value=\"http://www.lcccstudentlife.com/radio/images/thb_webcam.jpg\"></APPLET></a><br></TD>\n";
//			print "<td width=\"99%\" align=\"center\"><B>Now On-Air:</B></TD></TR><TR>\n";
			print "<td width=\"99%\" height=\"35\" bgcolor=\"#7B7BFF\" align=\"center\">\n";

			print "<a href=\"content.php?pageInfo=talent/$jockUrl&pageName=Duck%20Radio%20Talent\" target=\"duck_radio_talent\"><span class=\"onair\" style=\"cursor:pointer;cursor:hand\">$jockNfo<br>($ampmStart - $ampmEnd)</span></a>\n";
			$jockOn = 1;
		}
	}
}

fclose($fp);

if ($jockOn == 0) {
	print "<img src=\"./images/auto120.jpg\"><br></TD>\n";
//	print "<td width=\"99%\" align=\"center\"><B>Now On-Air:</B></TD></TR><TR>\n";
	print "<td width=\"99%\" height=\"35\" bgcolor=\"#7B7BFF\" align=\"center\">\n";
	print "<span class=\"onair\">Automation</span>\n";
}

?>