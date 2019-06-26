<?

/* To allow different stream types be free together in here  */
/* Chris "Kewl" Haslage, Program Director, Duck Radio        */
/* 4/11/04 @ 12:23a - 2:42a                                  */

// Usage: stream.php?url=207.44.150.47:9998&file=playlist.pls

header("Mime-version: 1.0"); 
header("Cache-control: private"); 
header("Content-Transfer-Encoding: 7bit"); 
header("Content-Disposition: inline;filename=$file");

if (eregi(".pls", $file)) {
	header("Content-Type: audio/x-scpls");				// PLS MIME
	print "[playlist]\nNumberOfEntries=1\nFile1=http://$url";

} else if (eregi(".m3u", $file)) {
	header("Content-type: audio/x-mpegurl"); 			// M3U MIME
	print "#EXTM3U\n";
	print "#EXTINF:000,LCCC Radio - The Duck\n";
	print "http://$url/\n";

} else if (eregi(".asx", $file)) {
	header("Content-Type: video/x-ms-asf");				// ASX MIME


	print "<asx version = \"3.0\"><title>LCCC Radio - The Duck</title>\n";
	print "<Banner href=\"http://www.lcccstudentlife.com/radio/images/wmplogo.gif\">\n";
	print "          <MoreInfo href =\"http://www.lcccradio.com\" />\n";
	print "          <Abstract>Visit LCCC Radio - The Duck's website!</Abstract>\n";
	print "</Banner>\n\n";
	print "<title>LCCC Radio - The Duck</title>  <entry>\n";
	print "  <title>LCCC Radio - The Duck</title>\n";
	print "    <ref href = \"http://$url\"/>\n";
	print "  </entry>\n";
	print "</asx>\n";

//	print "<ASX version = \"3.0\">\n";
//	print "<Title>LCCC Radio - The Duck</Title>\n";
//	print "<author>LCCC Radio - The Duck</author>\n";
//	print "<copyright>LCCC Radio - The Duck.  All Rights Reserved.</copyright>\n";
//	print "<Logo href = \"http://www.lcccstudentlife.com/radio/images/wmplogo.gif\" Style = \"ICON\" />\n";
//	print "<entry>\n";
//	print "<ref href = \"http://$url\"/>\n";
//	print "</entry>\n";
//	print "</ASX>\n";

} else if (eregi(".ram", $file)) {
	header("Content-Type: audio/x-pn-realaudio");			// RAM MIME
	print "http://$url";

} else if (eregi(".qtl", $file)) {
	header("Content-Type: video/x-quicktime-media-link");		// QTL MIME
	print "<?xml version=\"1.0\"?><?quicktime type=\"application/x-quicktime-media-link\"?>\n";
	print "<embed autoplay=\"true\" src=\"http://$url/listen.pls\"	/>";

}

?>